<?php

// All public forms must load this file before producing HTML or opening a database.
const DENTAL_FORM_MIN_SECONDS = 3;
const DENTAL_FORM_TTL = 1800;
const DENTAL_CAPTCHA_TTL = 600;
const DENTAL_FORM_RATE_WINDOW = 600;
const DENTAL_FORM_RATE_LIMIT = 10;

function dental_form_start_session()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        if (!session_start([
            'use_strict_mode' => true,
            'use_only_cookies' => true,
            'cookie_httponly' => true,
            'cookie_secure' => $https,
            'cookie_samesite' => 'Lax',
        ])) {
            dental_form_reject('contact', 'Verification is temporarily unavailable. Please try again later.', 503);
        }
    }
    // A cached page must never give another visitor the same form token.
    header('Cache-Control: no-store, private');
}

function dental_form_new_code()
{
    $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $alphabet[random_int(0, strlen($alphabet) - 1)];
    }
    return $code;
}

function dental_form_create_challenge($form, $now = null)
{
    if (!in_array($form, ['appointment', 'contact'], true)) {
        throw new InvalidArgumentException('Unknown form.');
    }
    $now = $now ?? time();
    $challenges = $_SESSION['dental_form_challenges'][$form] ?? [];
    foreach ($challenges as $token => $challenge) {
        if ($now - $challenge['created_at'] > DENTAL_FORM_TTL) {
            unset($challenges[$token]);
        }
    }
    // Preserve independently opened tabs, while keeping session storage bounded.
    while (count($challenges) >= 20) {
        array_shift($challenges);
    }
    $token = bin2hex(random_bytes(32));
    $challenges[$token] = [
        'created_at' => $now,
        'captcha_created_at' => $now,
        'code' => dental_form_new_code(),
        'rendered' => false,
        'refreshes' => 0,
    ];
    $_SESSION['dental_form_challenges'][$form] = $challenges;
    return $token;
}

function dental_form_fields($form)
{
    $token = dental_form_create_challenge($form);
    $id = 'security-code-' . substr($token, 0, 12);
    $image = 'captcha.php?form=' . rawurlencode($form) . '&token=' . $token;
    if (!defined('DENTAL_HAS_PROTECTED_FORM')) {
        define('DENTAL_HAS_PROTECTED_FORM', true);
    }
    ?>
    <input type="hidden" name="form_token" value="<?= $token ?>">
    <div class="form-security-trap" aria-hidden="true">
        <label>Leave this field empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>
    <div class="form-security">
        <label for="<?= $id ?>">Security code</label>
        <div class="form-security-image-row">
            <img class="form-security-image" src="<?= htmlspecialchars($image, ENT_QUOTES, 'UTF-8') ?>"
                 width="240" height="80" alt="Security code: type the six characters shown in this image.">
            <button type="button" class="form-security-refresh">New code</button>
        </div>
        <input type="text" class="form-control form-security-answer" name="captcha_answer" id="<?= $id ?>"
               required minlength="6" maxlength="6" pattern="[A-Za-z2-9]{6}" autocomplete="off"
               autocapitalize="characters" spellcheck="false" placeholder="Enter the 6 characters"
               aria-describedby="<?= $id ?>-help">
        <p class="form-security-help" id="<?= $id ?>-help">Letters are not case-sensitive. Code valid for 10 minutes.</p>
        <p class="form-security-feedback" role="status" aria-live="polite"></p>
        <noscript><p>Need a different code? Reload this page.</p></noscript>
    </div>
    <?php
}

// Atomically count requests outside the web root, across sessions and both forms.
// Only REMOTE_ADDR is trusted: a submitted forwarding header cannot reset limits.
function dental_form_rate_limit($directory, $ip, $now = null)
{
    $now = $now ?? time();
    if (!is_dir($directory) && !@mkdir($directory, 0700, true) && !is_dir($directory)) {
        return ['allowed' => false, 'storage_error' => true, 'retry_after' => 0];
    }
    $file = $directory . DIRECTORY_SEPARATOR . hash('sha256', $ip) . '.json';
    $handle = @fopen($file, 'c+');
    if (!$handle) {
        return ['allowed' => false, 'storage_error' => true, 'retry_after' => 0];
    }
    if (!flock($handle, LOCK_EX)) {
        fclose($handle);
        return ['allowed' => false, 'storage_error' => true, 'retry_after' => 0];
    }
    $state = json_decode(stream_get_contents($handle), true);
    if (!is_array($state) || !isset($state['expires'], $state['count']) || $state['expires'] <= $now) {
        $state = ['expires' => $now + DENTAL_FORM_RATE_WINDOW, 'count' => 0];
    }
    $allowed = $state['count'] < DENTAL_FORM_RATE_LIMIT;
    if ($allowed) {
        $state['count']++;
    }
    $data = json_encode($state);
    rewind($handle);
    $written = ftruncate($handle, 0) && fwrite($handle, $data) === strlen($data) && fflush($handle);
    flock($handle, LOCK_UN);
    fclose($handle);
    return [
        'allowed' => $allowed && $written,
        'storage_error' => !$written,
        'retry_after' => max(1, $state['expires'] - $now),
    ];
}

function dental_form_check_challenge($form, $post, $now = null)
{
    $now = $now ?? time();
    $token = $post['form_token'] ?? null;
    if (!is_string($token) || !preg_match('/\A[a-f0-9]{64}\z/', $token)
        || !isset($_SESSION['dental_form_challenges'][$form][$token])) {
        return ['status' => 403, 'message' => 'This form has expired or was already submitted. Please open a new form.'];
    }
    $challenge = $_SESSION['dental_form_challenges'][$form][$token];
    // Every attempt consumes the challenge, preventing guessing and double submits.
    unset($_SESSION['dental_form_challenges'][$form][$token]);
    if (!isset($post['website']) || !is_string($post['website']) || trim($post['website']) !== '') {
        return ['status' => 403, 'message' => 'Your submission could not be verified. Please open a new form.'];
    }
    $age = $now - $challenge['created_at'];
    if ($age < DENTAL_FORM_MIN_SECONDS) {
        return ['status' => 403, 'message' => 'The form was submitted too quickly. Please open a new form and try again.'];
    }
    if ($age > DENTAL_FORM_TTL || $now - $challenge['captcha_created_at'] > DENTAL_CAPTCHA_TTL) {
        return ['status' => 403, 'message' => 'Your security code has expired. Please open a new form.'];
    }
    $answer = $post['captcha_answer'] ?? null;
    if (!$challenge['rendered'] || !is_string($answer)
        || !preg_match('/\A[ABCDEFGHJKLMNPQRSTUVWXYZ23456789]{6}\z/i', trim($answer))
        || !hash_equals($challenge['code'], strtoupper(trim($answer)))) {
        return ['status' => 403, 'message' => 'The security code is incorrect. Please open a new form and enter the code shown.'];
    }
    return null;
}

function dental_form_guard($form)
{
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        header('Allow: POST');
        dental_form_reject($form, 'Please submit your request using the form.', 405);
    }
    $directory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'anish-dental-form-limits-'
        . substr(hash('sha256', dirname(__DIR__)), 0, 16);
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $limit = dental_form_rate_limit($directory, $ip);
    if ($limit['storage_error']) {
        error_log('Dental form: rate limit storage is unavailable.');
        dental_form_reject($form, 'Verification is temporarily unavailable. Please try again later.', 503);
    }
    if (!$limit['allowed']) {
        header('Retry-After: ' . $limit['retry_after']);
        dental_form_reject($form, 'Too many submission attempts. Please wait 10 minutes before trying again.', 429);
    }
    if ((int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > 32768) {
        dental_form_reject($form, 'Your submission is too large. Please shorten your message.', 413);
    }
    $error = dental_form_check_challenge($form, $_POST);
    if ($error !== null) {
        dental_form_reject($form, $error['message'], $error['status']);
    }
    session_write_close();
}

function dental_form_post_text($field, $maxLength)
{
    $value = $_POST[$field] ?? '';
    if (!is_string($value)) {
        return null;
    }
    $value = trim($value);
    if (strlen($value) > $maxLength || preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', $value)) {
        return null;
    }
    return $value;
}

function dental_form_valid_phone($phone)
{
    if (!is_string($phone) || !preg_match('/\A\+?[0-9 ()-]{7,25}\z/', $phone)) {
        return false;
    }
    $digits = preg_replace('/\D/', '', $phone);
    return strlen($digits) >= 7 && strlen($digits) <= 15;
}

function dental_form_reject($form, $message, $status)
{
    http_response_code($status);
    header('Content-Type: text/html; charset=UTF-8');
    header('Cache-Control: no-store, private');
    $page = $form === 'appointment' ? 'appointment.php' : 'contact.php';
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    echo '<!doctype html><html lang="en"><head><meta charset="UTF-8">'
        . '<meta name="viewport" content="width=device-width, initial-scale=1">'
        . '<title>Please check your form</title><link rel="stylesheet" href="assets/style.css"></head>'
        . '<body class="form-security-error-page"><main class="form-security-error-card">'
        . '<h1>Please check your form</h1><p>' . $message . '</p>'
        . '<a href="' . $page . '">Return to form</a></main></body></html>';
    exit;
}

dental_form_start_session();
