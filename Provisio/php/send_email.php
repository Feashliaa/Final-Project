<?php
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate input
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo "Please fill out all fields.";
    exit;
}

$mail = new PHPMailer(true);

try {
    // Set up your email settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'provisiobravo@gmail.com';
    $mail->Password = 'yscunbrfdbufdarx';
    $mail->SMTPSecure = 'ssl'; // or 'ssl'
    $mail->Port = 465; // or 465 for SSL

    // Set the email sender, recipient, subject, and body
    $mail->setFrom($email, $name);
    $mail->addAddress('provisiobravo@gmail.com', 'Bravo Team');
    $mail->isHTML(false);
    $mail->Subject = "Message from $name ($email)";
    $mail->Body = "Message from $name ($email): $message";

    // Send the email
    $mail->send();
    echo "Your message has been sent!";
} catch (Exception $e) {
    http_response_code(500);
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
