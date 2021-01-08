<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'test870211test@gmail.com';
    $mail->Password = 'Test12345t';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('test870211test@gmail.com', 'Admin');
    // $mail->addAddress('recipient1@example.net', 'Recipient1');
    $mail->addAddress('test870211test@gmail.com');
    $mail->addReplyTo('test870211test@gmail.com', 'noreply');
    $mail->addCC('test870211test@gmail.com');
    $mail->addBCC('test870211test@gmail.com');

    //Attachments
    // $mail->addAttachment('/backup/myfile.tar.gz');

    //Content
    $mail->isHTML(true);
    $mail->Subject = '耶成功!';
    $mail->Body    = '開心';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
