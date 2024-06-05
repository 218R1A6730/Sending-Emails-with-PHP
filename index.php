<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  // Enable verbose debug output (uncomment for debugging)
    $mail->isSMTP();                                           // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'bhavanakruthi2904@gmail.com';         // SMTP username
    $mail->Password   = 'suykg ltur zibu gdbo';                // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable SSL encryption
    $mail->Port       = 465;                                   // TCP port to connect to for SSL

    // Recipients
    $mail->setFrom('bhavanakruthi2904@gmail.com', 'Mailer');
    $mail->addAddress('bhavanakruthi2904@gmail.com', 'Joe User');

    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
