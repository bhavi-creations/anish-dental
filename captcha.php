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
if (!extension_loaded('gd')) {
    error_log('Dental form CAPTCHA requires the PHP GD extension.');
    http_response_code(503);
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
$challenge['rendered'] = true;
unset($challenge);
session_write_close();

// Render pixels only; the answer never appears in HTML, JavaScript, or the URL.
$image = imagecreatetruecolor(240, 80);
$background = imagecolorallocate($image, 246, 248, 241);
imagefill($image, 0, 0, $background);
for ($i = 0; $i < 120; $i++) {
    $noise = imagecolorallocate($image, random_int(150, 220), random_int(165, 220), random_int(140, 210));
    imagefilledellipse($image, random_int(0, 239), random_int(0, 79), 2, 2, $noise);
}
for ($i = 0; $i < 5; $i++) {
    $noise = imagecolorallocate($image, random_int(150, 200), random_int(165, 210), random_int(140, 190));
    imageline($image, random_int(0, 40), random_int(0, 79), random_int(200, 239), random_int(0, 79), $noise);
}
for ($i = 0; $i < 6; $i++) {
    $glyph = imagecreatetruecolor(14, 20);
    imagefill($glyph, 0, 0, imagecolorallocate($glyph, 246, 248, 241));
    $ink = imagecolorallocate($glyph, random_int(20, 60), random_int(40, 85), random_int(20, 60));
    imagestring($glyph, 5, 2, 2, $code[$i], $ink);
    $scaled = imagescale($glyph, 28, 40, IMG_NEAREST_NEIGHBOUR);
    $rotated = imagerotate($scaled, random_int(-18, 18), $background);
    imagecopy($image, $rotated, 12 + $i * 37, random_int(12, 25), 0, 0, imagesx($rotated), imagesy($rotated));
    imagedestroy($glyph);
    imagedestroy($scaled);
    imagedestroy($rotated);
}
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
