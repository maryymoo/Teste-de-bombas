<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\composer\vendor\autoload.php';
// require 'vendor\autoload.php';

$errors = [];
$errorMessage = ' ';
$successMessage = ' ';
echo 'sending ...';
if (!empty($_POST))
{
echo 'tem coisa no post ...';
  $name = $_POST['firstName'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if (empty($name)) {
      $errors[] = 'Name is empty';
  }

  if (empty($email)) {
      $errors[] = 'Email is empty';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is invalid';

  }

  if (empty($message)) {
      $errors[] = 'Message is empty';
  }

  if (!empty($errors)) {
      $allErrors = join ('<br/>', $errors);
      echo $allErrors;
      $errorMessage = "<p style='color: red; '>{$allErrors}</p>";
  } else {
    echo 'okay ...';
      $fromEmail = 'maria.m.cardoso56@gmail.com';
      $emailSubject = 'New email from your contact form';

      // Create a new PHPMailer instance
      $mail = new PHPMailer(true);
      try {
        echo 'trying ...';
            // Configure the PHPMailer instance
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'maria.m.cardoso56@gmail.com';
            $mail->Password = '6442';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
           
            // Set the sender, recipient, subject, and body of the message 
            $mail->setFrom($email);
            $mail->addAddress($email);
            $mail->setFrom($fromEmail);
            $mail->Subject = $emailSubject;
            $mail->isHTML(true); // Fix: Remove 'isHtml:' parameter
            $mail->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";
         echo 'agora é só mander ...';
            // Send the message
            $mail->send();
            echo 'MANDOU PORRA';
            $successMessage = "<p style='color: green; '>Thank you for contacting us :)</p>";
      } catch (Exception $e) {
            $errorMessage = "<p style='color: red; '>Oops, something went wrong. Please try again later</p>";
            echo $errorMessage;
      }
  }
}

?>

