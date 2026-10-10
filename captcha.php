<?php
require_once __DIR__ . '/includes/form_security.php';

header('X-Content-Type-Options: nosniff');
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
    header('Allow: GET');
    http_response_code(405);
    exit;
}
$form = $_GET['form'] ?? null;
$token = $_GET['token'] ?? null;
if (!is_string($form) || !in_array($form, ['appointment', 'contact'], true)
    || !is_string($token) || !preg_match('/\A[a-f0-9]{64}\z/', $token)
    || !isset($_SESSION['dental_form_challenges'][$form][$token])) {
    http_response_code(404);
    exit;
}
$challenge = &$_SESSION['dental_form_challenges'][$form][$token];
if (time() - $challenge['created_at'] > DENTAL_FORM_TTL) {
    unset($_SESSION['dental_form_challenges'][$form][$token]);
    http_response_code(410);
    exit;
}
if (($_GET['refresh'] ?? '') === '1') {
    if ($challenge['refreshes'] >= 10) {
        http_response_code(429);
        exit;
    }
    $challenge['code'] = dental_form_new_code();
    $challenge['captcha_created_at'] = time();
    $challenge['refreshes']++;
}
$code = $challenge['code'];
require_once __DIR__ . '/includes/captcha_image.php';
try {
    $png = dental_captcha_image($code);
} catch (Throwable $error) {
    error_log('Dental CAPTCHA: image generation failed.');
    http_response_code(503);
    exit;
}
$challenge['rendered'] = true;
unset($challenge);
session_write_close();

header('Content-Type: image/png');
echo $png;
