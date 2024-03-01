<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = False;
$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = 'Off';
$mail->Port = 25;

$mail->setFrom('from-email@gmail.com', 'Your Name');
$mail->addAddress('recipient-email@example.com');   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

// TLS mode: None
// SMTP Server is listening on port 25.
// Keeping last 100 messages and 100 sessions.
// IMAP Server is listening on port 143
// Now listening on: http://localhost:5000
