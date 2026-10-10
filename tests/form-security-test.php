<?php
// Run with: php tests/form-security-test.php
// This test never connects to the database or sends email.
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$worker = $argv[1] ?? '';
$testDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'dental-form-test-' . bin2hex(random_bytes(8));
mkdir($testDirectory, 0700);
session_save_path($testDirectory);
require_once dirname(__DIR__) . '/includes/form_security.php';
register_shutdown_function(function () use ($testDirectory) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }
    foreach (glob($testDirectory . DIRECTORY_SEPARATOR . '*') as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    rmdir($testDirectory);
});

function fixture($form = 'contact', $age = 5)
{
    $token = dental_form_create_challenge($form, time() - $age);
    $_SESSION['dental_form_challenges'][$form][$token]['rendered'] = true;
    return [
        'form_token' => $token,
        'website' => '',
        'captcha_answer' => $_SESSION['dental_form_challenges'][$form][$token]['code'],
    ];
}

// Child processes exercise exit paths in the real submission handlers.
if (in_array($worker, ['missing-contact', 'missing-appointment', 'missing-legacy', 'invalid-contact', 'invalid-appointment', 'guard-success', 'image', 'image-refresh'], true)) {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    // Keep test limits separate from visitors and other test runs.
    $_SERVER['REMOTE_ADDR'] = 'test-' . bin2hex(random_bytes(16));
    register_shutdown_function(function () {
        $rateDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'anish-dental-form-limits-'
            . substr(hash('sha256', dirname(__DIR__)), 0, 16);
        $file = $rateDirectory . DIRECTORY_SEPARATOR . hash('sha256', $_SERVER['REMOTE_ADDR']) . '.json';
        if (is_file($file)) {
            unlink($file);
        }
        if (http_response_code()) {
            fwrite(STDERR, 'HTTP_STATUS=' . http_response_code());
        }
    });
    if ($worker === 'image' || $worker === 'image-refresh') {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $post = fixture();
        $_GET = ['form' => 'contact', 'token' => $post['form_token']];
        $_SESSION['dental_form_challenges']['contact'][$post['form_token']]['rendered'] = false;
        if ($worker === 'image-refresh') {
            $_GET['refresh'] = '1';
        }
        require dirname(__DIR__) . '/captcha.php';
        $challenge = $_SESSION['dental_form_challenges']['contact'][$post['form_token']];
        fwrite(STDERR, 'IMAGE_RENDERED=' . (int) $challenge['rendered'] . ';REFRESHES=' . $challenge['refreshes']);
        exit;
    }
    $form = strpos($worker, 'appointment') !== false ? 'appointment' : 'contact';
    $_POST = strpos($worker, 'invalid-') === 0 || $worker === 'guard-success' ? fixture($form) : [];
    if ($worker === 'guard-success') {
        dental_form_guard($form);
        echo 'VERIFIED';
        exit;
    }
    // Invalid field data must be rejected after CAPTCHA, before any side effect.
    if (strpos($worker, 'invalid-') === 0) {
        $_POST += ['name' => ['malformed'], 'email' => 'invalid', 'phone' => 'x'];
    }
    $handler = $worker === 'missing-legacy' ? '/send_mail.php'
        : ($form === 'appointment' ? '/save_appointment.php' : '/contactform.php');
    require dirname(__DIR__) . $handler;
    exit;
}

$checks = 0;
function check($condition, $label)
{
    global $checks;
    $checks++;
    if (!$condition) {
        throw new RuntimeException('FAILED: ' . $label);
    }
}

function run_worker($name)
{
    $process = proc_open([PHP_BINARY, __FILE__, $name], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
    $output = stream_get_contents($pipes[1]);
    $error = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    $code = proc_close($process);
    check($code === 0, $name . ' exits without PHP errors: ' . $error);
    return [$output, $error];
}

$post = fixture();
$post['captcha_answer'] = strtolower($post['captcha_answer']);
check(dental_form_check_challenge('contact', $post) === null, 'correct code is accepted case-insensitively');
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'a successful code cannot be reused');
check(dental_form_check_challenge('contact', [])['status'] === 403, 'direct POST without a form is rejected');
check(dental_form_check_challenge('contact', ['form_token' => []])['status'] === 403, 'array tokens are rejected');

$post = fixture();
$post['captcha_answer'] = '000000';
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'incorrect code is rejected');
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'incorrect attempts consume the challenge');
$post = fixture();
$post['captcha_answer'] = [];
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'array answers are rejected');
$post = fixture();
$post['website'] = 'spam.example';
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'filled honeypot is rejected');
$post = fixture();
unset($post['website']);
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'missing honeypot is rejected');
check(dental_form_check_challenge('contact', fixture('contact', 0))['status'] === 403, 'instant submissions are rejected');
check(dental_form_check_challenge('contact', fixture('contact', DENTAL_CAPTCHA_TTL + 1))['status'] === 403, 'expired CAPTCHA is rejected');
check(dental_form_check_challenge('contact', fixture('contact', DENTAL_FORM_TTL + 1))['status'] === 403, 'expired form is rejected');

$post = fixture();
$_SESSION['dental_form_challenges']['contact'][$post['form_token']]['rendered'] = false;
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'code cannot pass before its image is requested');
$post = fixture('appointment');
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'appointment tokens do not authorize contact submissions');
check(dental_form_check_challenge('appointment', $post) === null, 'appointment token remains usable on its own form');
$firstTab = fixture();
$secondTab = fixture();
check(dental_form_check_challenge('contact', $firstTab) === null, 'first tab remains valid');
check(dental_form_check_challenge('contact', $secondTab) === null, 'second tab remains valid');
$post = fixture();
$savedSession = $_SESSION;
$_SESSION = [];
check(dental_form_check_challenge('contact', $post)['status'] === 403, 'a token from another session is rejected');
$_SESSION = $savedSession;
for ($i = 0; $i < 30; $i++) {
    fixture();
}
check(count($_SESSION['dental_form_challenges']['contact']) <= 20, 'session challenge storage is bounded');

for ($i = 0; $i < DENTAL_FORM_RATE_LIMIT; $i++) {
    check(dental_form_rate_limit($testDirectory, 'test-ip', 1000)['allowed'], 'requests within the limit are allowed');
}
check(!dental_form_rate_limit($testDirectory, 'test-ip', 1001)['allowed'], 'rate limit blocks repeated requests');
check(dental_form_rate_limit($testDirectory, 'another-ip', 1001)['allowed'], 'another visitor is not blocked');
check(dental_form_rate_limit($testDirectory, 'test-ip', 1600)['allowed'], 'rate limit expires');
file_put_contents($testDirectory . DIRECTORY_SEPARATOR . 'not-a-directory', 'test');
check(dental_form_rate_limit($testDirectory . DIRECTORY_SEPARATOR . 'not-a-directory', 'ip')['storage_error'], 'unavailable rate storage fails closed');
check(dental_form_valid_phone('+91 73962 56474'), 'formatted phone numbers are accepted');
check(!dental_form_valid_phone('123'), 'short phone numbers are rejected');
check(!dental_form_valid_phone(['1234567890']), 'array phone numbers are rejected');
$_POST = ['name' => ['spam'], 'message' => str_repeat('x', 5001)];
check(dental_form_post_text('name', 120) === null, 'malformed text fields are rejected');
check(dental_form_post_text('message', 5000) === null, 'oversized text is rejected');

foreach (['missing-contact', 'missing-appointment', 'missing-legacy'] as $worker) {
    [$output, $error] = run_worker($worker);
    check(strpos($error, 'HTTP_STATUS=403') !== false, $worker . ' returns 403 before database or mail');
    check(strpos($output, 'Return to form') !== false, $worker . ' gives a recovery link');
}
foreach (['invalid-contact', 'invalid-appointment'] as $worker) {
    [$output, $error] = run_worker($worker);
    check(strpos($error, 'HTTP_STATUS=422') !== false, $worker . ' rejects malformed fields before database or mail');
}
[$output] = run_worker('guard-success');
check($output === 'VERIFIED', 'a verified request proceeds past the shared guard');
[$output, $error] = run_worker('image');
check(substr($output, 0, 8) === "\x89PNG\r\n\x1a\n", 'CAPTCHA endpoint produces PNG bytes');
$dimensions = getimagesizefromstring($output);
check($dimensions[0] === 240 && $dimensions[1] === 80, 'CAPTCHA image has the expected dimensions');
check(strpos($error, 'IMAGE_RENDERED=1;REFRESHES=0') !== false, 'loading the image enables server verification');
[$output, $error] = run_worker('image-refresh');
check(substr($output, 0, 8) === "\x89PNG\r\n\x1a\n", 'refresh produces a valid image');
check(strpos($error, 'IMAGE_RENDERED=1;REFRESHES=1') !== false, 'refresh updates server challenge state');

echo 'Passed ' . $checks . " form security checks. No database writes or email sent.\n";
