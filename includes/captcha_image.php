<?php

function dental_captcha_image($code)
{
    if (!is_string($code) || !preg_match('/\A[ABCDEFGHJKLMNPQRSTUVWXYZ23456789]{6}\z/', $code)) {
        throw new InvalidArgumentException('Invalid CAPTCHA code.');
    }
    if (extension_loaded('gd') && function_exists('imagepng')) {
        try {
            $png = dental_captcha_gd_image($code);
            if (substr($png, 0, 8) === "\x89PNG\r\n\x1a\n") {
                return $png;
            }
        } catch (Throwable $error) {
            error_log('Dental CAPTCHA: GD rendering failed; using the portable renderer.');
        }
    }
    return dental_captcha_portable_image($code);
}

function dental_captcha_gd_image($code)
{
    ob_start();
    $image = null;
    try {
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
        imagepng($image);
        return ob_get_contents();
    } finally {
        ob_end_clean();
        if ($image) {
            imagedestroy($image);
        }
    }
}

// Draw raster pixels in PHP when a cloned installation does not have GD enabled.
// The answer is never embedded as SVG text, HTML, a URL, or PNG metadata.
function dental_captcha_portable_image($code)
{
    $font = [
        'A' => '01110/10001/10001/11111/10001/10001/10001',
        'B' => '11110/10001/10001/11110/10001/10001/11110',
        'C' => '01111/10000/10000/10000/10000/10000/01111',
        'D' => '11110/10001/10001/10001/10001/10001/11110',
        'E' => '11111/10000/10000/11110/10000/10000/11111',
        'F' => '11111/10000/10000/11110/10000/10000/10000',
        'G' => '01110/10001/10000/10111/10001/10001/01110',
        'H' => '10001/10001/10001/11111/10001/10001/10001',
        'J' => '00111/00010/00010/00010/10010/10010/01100',
        'K' => '10001/10010/10100/11000/10100/10010/10001',
        'L' => '10000/10000/10000/10000/10000/10000/11111',
        'M' => '10001/11011/10101/10101/10001/10001/10001',
        'N' => '10001/11001/11001/10101/10011/10011/10001',
        'P' => '11110/10001/10001/11110/10000/10000/10000',
        'Q' => '01110/10001/10001/10001/10101/10010/01101',
        'R' => '11110/10001/10001/11110/10100/10010/10001',
        'S' => '01111/10000/10000/01110/00001/00001/11110',
        'T' => '11111/00100/00100/00100/00100/00100/00100',
        'U' => '10001/10001/10001/10001/10001/10001/01110',
        'V' => '10001/10001/10001/10001/10001/01010/00100',
        'W' => '10001/10001/10001/10101/10101/10101/01010',
        'X' => '10001/10001/01010/00100/01010/10001/10001',
        'Y' => '10001/10001/01010/00100/00100/00100/00100',
        'Z' => '11111/00001/00010/00100/01000/10000/11111',
        '2' => '01110/10001/00001/00010/00100/01000/11111',
        '3' => '11110/00001/00001/01110/00001/00001/11110',
        '4' => '00010/00110/01010/10010/11111/00010/00010',
        '5' => '11111/10000/10000/11110/00001/00001/11110',
        '6' => '01110/10000/10000/11110/10001/10001/01110',
        '7' => '11111/00001/00010/00100/01000/01000/01000',
        '8' => '01110/10001/10001/01110/10001/10001/01110',
        '9' => '01110/10001/10001/01111/00001/00001/01110',
    ];
    $rows = array_fill(0, 80, str_repeat("\xf6\xf8\xf1", 240));
    for ($i = 0; $i < 180; $i++) {
        $color = chr(random_int(150, 220)) . chr(random_int(165, 220)) . chr(random_int(140, 210));
        dental_captcha_pixel($rows, random_int(0, 239), random_int(0, 79), $color);
    }
    for ($line = 0; $line < 5; $line++) {
        $base = random_int(10, 65);
        $phase = random_int(0, 20);
        for ($x = 0; $x < 240; $x++) {
            dental_captcha_pixel($rows, $x, (int) ($base + 8 * sin(($x + $phase) / 30)), "\xba\xcb\xa5");
        }
    }
    for ($i = 0; $i < 6; $i++) {
        $glyph = explode('/', $font[$code[$i]]);
        $scale = random_int(4, 5);
        $angle = deg2rad(random_int(-16, 16));
        $cos = cos($angle);
        $sin = sin($angle);
        $left = 15 + $i * 37;
        $top = random_int(18, 29);
        $color = chr(random_int(20, 60)) . chr(random_int(40, 85)) . chr(random_int(20, 60));
        for ($y = 0; $y < 7 * $scale; $y++) {
            for ($x = 0; $x < 5 * $scale; $x++) {
                if ($glyph[intdiv($y, $scale)][intdiv($x, $scale)] !== '1') {
                    continue;
                }
                $dx = $x - 2.5 * $scale;
                $dy = $y - 3.5 * $scale;
                $px = (int) round($left + 2.5 * $scale + $dx * $cos - $dy * $sin);
                $py = (int) round($top + 3.5 * $scale + $dx * $sin + $dy * $cos);
                dental_captcha_pixel($rows, $px, $py, $color);
            }
        }
    }
    $raw = '';
    foreach ($rows as $row) {
        $raw .= "\x00" . $row; // PNG filter type 0 for each RGB scanline.
    }
    if (function_exists('gzcompress')) {
        $compressed = gzcompress($raw, 6);
    } else {
        // One stored DEFLATE block also works when the zlib extension is absent.
        // This fixed-size image has 57,680 scanline bytes, below the 65,535 limit.
        $length = strlen($raw);
        $compressed = "\x78\x01\x01" . pack('vv', $length, $length ^ 0xffff)
            . $raw . hash('adler32', $raw, true);
    }
    return "\x89PNG\r\n\x1a\n"
        . dental_captcha_png_chunk('IHDR', pack('NNCCCCC', 240, 80, 8, 2, 0, 0, 0))
        . dental_captcha_png_chunk('IDAT', $compressed)
        . dental_captcha_png_chunk('IEND', '');
}

function dental_captcha_pixel(&$rows, $x, $y, $color)
{
    if ($x >= 0 && $x < 240 && $y >= 0 && $y < 80) {
        $offset = $x * 3;
        $rows[$y][$offset] = $color[0];
        $rows[$y][$offset + 1] = $color[1];
        $rows[$y][$offset + 2] = $color[2];
    }
}

function dental_captcha_png_chunk($type, $data)
{
    return pack('N', strlen($data)) . $type . $data . pack('N', crc32($type . $data));
}
