<?php
require 'C:\Users\sarve\OneDrive\Desktop\email\PHPMailer\src\PHPMailer.php';
require 'C:\Users\sarve\OneDrive\Desktop\email\PHPMailer\src\SMTP.php';
require 'C:\Users\sarve\OneDrive\Desktop\email\PHPMailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Retrieve the user's email address from the form submission
if (isset($_POST['email'])) {
    // Retrieve the user's email address from the form submission
    $email = $_POST['email'];

    // Generate a confirmation token
    function generateToken($length = 32) {
        $bytes = random_bytes($length);
        return base64_encode($bytes);
    }

    // Store the confirmation token and user's email in the database

    // Construct the confirmation email
    $subject = 'Confirmation Email';
    $message = 'Thank you for registering. Please click the link to confirm your email';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'sarveshpadma.13@gmail.com'; // Your Gmail email address
    $mail->Password = 'sarvesh@1316'; // Your Gmail password
    $mail->setFrom('sarveshpadma.13@gmail.com', 'sarvesh');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->msgHTML($message);

    try {
        $mail->send();
        echo 'Confirmation email sent successfully.';
    } catch (Exception $e) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Email field is missing in the form submission.';
}
?>
