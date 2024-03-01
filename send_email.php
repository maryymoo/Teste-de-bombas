<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//use PHPMailer\PHPMailer\SMTP;
$errors = [];
$errorMessage = ' ';
$successMessage = ' ';

echo 'Mandando essa bosta...' . "<br/>";

if (!empty($_POST)) {
    echo 'Essa bosta foi reconhecida...' . "<br/>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        echo $allErrors . "<br/>";
        $errorMessage = "<p style='color: red; '>{$allErrors}</p>";
    } else {
        echo 'Sem erros, a mãe é profissional né more...' . "<br/>";
        $emailSubject = 'Novo email do site finewinetraveller.com';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            echo 'Configurando SMTP, é agora que vai cagar tudo...' . "<br/>";
            // Configure the PHPMailer instance
            //http://ajuda.clientes.eurotux.com/manuais/blackberry/email_blackberry.html
            // ou...
            //http://ajuda.clientes.eurotux.com/manuais/android/email_android.html
            $mail->isSMTP();

            // Versão final
            // $mail->Host = 'mail1.clientes.eurotux.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = email do finewine;
            // $mail->Password = password do finewine;
            // $mail->SMTPSecure = '';
            // $mail->Port = ;

            // Versão de teste
            $mail->Host = 'localhost';
            $mail->SMTPAuth = false; //False só para teste
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = 'Off'; //Off só para teste
            $mail->Port = 25;

            // Set the sender, recipient, subject, and body of the message
            $mail->setFrom($email);
            $mail->addAddress('contact.us@finewinetraveller.pt');
            $mail->CharSet = "UTF-8";
            $mail->Subject = $emailSubject;
            $mail->isHTML(true); // Fix: Remove 'isHtml:' parameter
            $mail->Body = "<p>Messagem: {$message}</p><br><p>Favor contatar: {$email},</p><br><p>{$name}.</p>";
            echo 'Agora é só mandar, agora sim já era...' . "<br/>";
            // Send the message
            $mail->send();
            $successMessage = "<p style='color: green; '>Thank you for contacting us :)<br>NUNCA DUVIDEI</p>";
            echo $successMessage . "<br/>";
        } catch (Exception $e) {
            $errorMessage =
            "<p style='color: red; '>Ooooops, something went wrong (っ °Д °;)っ Please try again later</p>";
            echo $errorMessage . "<br/>";
        }
    }
}
