<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/includes/form_security.php';
dental_form_guard('contact');

$name = dental_form_post_text('name', 120);
$email = dental_form_post_text('email', 254);
$number = dental_form_post_text('number', 25);
$message = dental_form_post_text('message', 5000);
if ($name === null || $name === '' || $email === null || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || !dental_form_valid_phone($number) || $message === null || $message === '') {
    dental_form_reject('contact', 'Please enter a valid name, email, phone number and message.', 422);
}

require __DIR__ . '/vendor/autoload.php';

// Check if the form is submitted
//-----Contact form------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $number = htmlspecialchars($number, ENT_QUOTES, 'UTF-8');
    $message = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anishdentalhospital@gmail.com'; // Your Gmail email address
        $mail->Password = 'gpnizvggwjcmcjjq'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('anishdentalhospital@gmail.com', 'Anish Dental Multispeciality Dental '); // Your Gmail email and name
        $mail->addAddress('anishdentalhospital@gmail.com', 'Anish Dental Multispeciality Dentals'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
           
            <h1>Contact Details</h1>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
        
            <p><strong>Phone:</strong> $number</p>
            <p><strong>Message:</strong>$message</p>
        ";

        $mail->send();
        echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="thankyou.php";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
?>
