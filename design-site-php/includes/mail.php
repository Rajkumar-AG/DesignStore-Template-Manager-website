<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendMail($name, $email, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // your Gmail
        $mail->Password = 'your_app_password';    // your App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('your_email@gmail.com', 'Rajkumar');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Message';
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
