<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer files include cheyandi (Composer waaduthunte: require 'vendor/autoload.php';)
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name    = htmlspecialchars(trim($_POST['name']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        // ===================================================
        // SMTP SETTINGS & CREDENTIALS
        // ===================================================
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';             // Gmail SMTP Server
        $mail->SMTPAuth   = true;
        
        // ---------------------------------------------------
        // EKKADA MEE EMAIL & APP PASSWORD ENTER CHEYYALI:
        // ---------------------------------------------------
        $mail->Username   = 'manimalladi05@gmail.com';     // <-- IKKADA MEE GMAIL ID (Sender Email)
        $mail->Password   = 'nsmgbxkyqxqrwfjh';        // <-- IKKADA MEE 16-DIGIT APP PASSWORD 
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;                          // Port: 587 (TLS) or 465 (SSL)

        // Receivers Info
        $mail->setFrom('manimalladi05@gmail.com', $name);  // Sender Email
        $mail->addAddress('manimalladi05@gmail.com');      // Mail eh address ki raavalano (Receiver Email)
        $mail->addReplyTo($email, $name);                  // Form fill chesina user email

        // Mail Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission: " . $subject;
        $mail->Body    = "
            <h3>New Message Details</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        header("Location: index.html?status=success");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: index.php");
    exit;
}
?>