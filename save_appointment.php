<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/includes/form_security.php';
dental_form_guard('appointment');

$name = dental_form_post_text('name', 120);
$email = dental_form_post_text('email', 254);
$phone = dental_form_post_text('phone', 25);
$date = dental_form_post_text('appointment_date', 10);
$slot = dental_form_post_text('time_slot', 30);
$msg = dental_form_post_text('message', 5000);
$validDate = is_string($date) ? DateTimeImmutable::createFromFormat('!Y-m-d', $date) : false;
$allowedSlots = [
    '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM',
    '12:00 PM - 01:00 PM', '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM',
    '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM',
    '06:00 PM - 07:00 PM', '07:00 PM - 08:00 PM', '08:00 PM - 09:00 PM',
];
if ($name === null || $name === '' || $email === null || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || !dental_form_valid_phone($phone) || $msg === null
    || !$validDate || $validDate->format('Y-m-d') !== $date || $date < date('Y-m-d')
    || !in_array($slot, $allowedSlots, true)) {
    dental_form_reject('appointment', 'Please enter a valid name, email, phone number, appointment date and time slot.', 422);
}

// Database writes and mail are reachable only after all verification succeeds.
include __DIR__ . '/db.connection/db_connection.php';
require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $day = date('l', strtotime($date));

    /* ======================
       HOLIDAY CHECK
       ====================== */
    $stmt = $conn->prepare(
        "SELECT holiday_type, reason 
         FROM holidays 
         WHERE holiday_date=?"
    );
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $h = $stmt->get_result();

    if ($h->num_rows > 0) {
        $row  = $h->fetch_assoc();
        $type = $row['holiday_type'];

        $morningSlots = [

            "09:00 AM - 10:00 AM",
            "10:00 AM - 11:00 AM",
            "11:00 AM - 12:00 PM",
            "12:00 PM - 01:00 PM",
            "01:00 PM - 02:00 PM"
        ];

        $afternoonSlots = [
            "02:00 PM - 03:00 PM",
            "03:00 PM - 04:00 PM",
            "04:00 PM - 05:00 PM",
            "05:00 PM - 06:00 PM",
            "06:00 PM - 07:00 PM",
            "07:00 PM - 08:30 PM",

        ];

        if (
            $type == 'fullday' ||
            ($type == 'morning' && in_array($slot, $morningSlots)) ||
            ($type == 'afternoon' && in_array($slot, $afternoonSlots))
        ) {
            echo "<script>
                alert('" . $row['reason'] . "');
                window.location='index.php';
            </script>";
            exit;
        }
    }

    /* ======================
       SLOT LIMIT CHECK
       ====================== */
    $stmt = $conn->prepare(
        "SELECT COUNT(*) AS total 
         FROM appointments 
         WHERE appointment_date=? AND time_slot=?"
    );
    $stmt->bind_param("ss", $date, $slot);
    $stmt->execute();
    $count = $stmt->get_result()->fetch_assoc();

    if ($count['total'] >= 3) {
        echo "<script>
            alert('This time slot is FULL');
            window.location='index.php';
        </script>";
        exit;
    }

    /* ======================
       INSERT APPOINTMENT
       ====================== */
    $stmt = $conn->prepare(
        "INSERT INTO appointments 
        (name, email, phone, appointment_date, time_slot, message)
        VALUES (?,?,?,?,?,?)"
    );
    $stmt->bind_param("ssssss", $name, $email, $phone, $date, $slot, $msg);
    $stmt->execute();

    // Escape user text before inserting it into HTML email bodies.
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $emailHtml = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
    $msg = nl2br(htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'));

    /* ======================
       MAIL TO DOCTOR ONLY
       ====================== */
    $mailDoctor = new PHPMailer(true);

    try {
        $mailDoctor->isSMTP();
        $mailDoctor->Host       = 'smtp.gmail.com';
        $mailDoctor->SMTPAuth   = true;
        $mailDoctor->Username   = 'anishdentalhospital@gmail.com';
        $mailDoctor->Password   = 'gpnizvggwjcmcjjq';
        $mailDoctor->SMTPSecure = 'tls';
        $mailDoctor->Port       = 587;


        // $mailDoctor->Username   = 'anishdentalhospital@gmail.com';
        // $mailDoctor->Password   = 'nsmgbxkyqxqrwfjh';

        $mailDoctor->setFrom(
            'anishdentalhospital@gmail.com',
            'Clinic Appointment System'
        );

        $mailDoctor->addAddress('anishdentalhospital@gmail.com');

        $mailDoctor->isHTML(true);
        $mailDoctor->Subject = 'New Appointment Booked';

        $mailDoctor->Body = "
            <h2>New Appointment Details</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Email:</strong> $emailHtml</p>
            <p><strong>Date:</strong> $date ($day)</p>
            <p><strong>Time Slot:</strong> $slot</p>
            <p><strong>Message:</strong> $msg</p>
        ";

        $mailDoctor->send();
    } catch (Exception $e) {
        echo 'Doctor Mail Error: ' . $mailDoctor->ErrorInfo;
        exit;
    }

    /* ======================
       MAIL TO PATIENT ONLY
       ====================== */
    $mailPatient = new PHPMailer(true);

    try {
        $mailPatient->isSMTP();
        $mailPatient->Host       = 'smtp.gmail.com';
        $mailPatient->SMTPAuth   = true;
        $mailPatient->Username   = 'anishdentalhospital@gmail.com';
        $mailPatient->Password   = 'gpnizvggwjcmcjjq';
        $mailPatient->SMTPSecure = 'tls';
        $mailPatient->Port       = 587;

        $mailPatient->setFrom(
            'anishdentalhospital@gmail.com',
            'Anish Dental Specialities'
        );

        $mailPatient->addAddress($email);

        $mailPatient->isHTML(true);
        $mailPatient->Subject = 'Appointment Confirmation';

        $mailPatient->Body = "
            <h2>Appointment Confirmed ✅</h2>
            <p>Dear <strong>$name</strong>,</p>

            <p>Your appointment has been successfully booked.</p>

            <table cellpadding='6'>
                <tr><td><strong>Date</strong></td><td>$date ($day)</td></tr>
                <tr><td><strong>Time</strong></td><td>$slot</td></tr>
                <tr><td><strong>Phone</strong></td><td>$phone</td></tr>
            </table>

            <p>Thank you for choosing<br>
            <b>Anish Dental Specialities</b>.</p>
        ";

        $mailPatient->send();

        echo "<script>
           
            window.location='thankyou.php';
        </script>";
    } catch (Exception $e) {
        echo 'Patient Mail Error: ' . $mailPatient->ErrorInfo;
    }
}
