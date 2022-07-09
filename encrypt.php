<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

if(isset($_POST['send'])){

    try {
    $receiver = $_POST['receiver'];
    $msg = $_POST['message'];
    $messagebird = new MessageBird\Client('poiIO0fJZAiz7Ikp2ohLWkZs0');//use live key
    $message = new MessageBird\Objects\Message;
    $message->originator = '+254707621524';
    $message->recipients = [ $receiver];

    $key_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
    $encryption_key = substr(str_shuffle($key_string), 0, 10); //randomize key
    // sends key using MessageBird API
    $message->body = "Decrypt message using this key: ".$encryption_key;
    $response = $messagebird->messages->create($message);
    var_dump($response);

    $ciphering = "AES-128-CTR"; //stores the cipher method
    $option = 0; //holds the bitwise disjunction of the flags
    $encryption_iv = '1234567890123456'; //holds the initialization vector  which is not null
    $encryption = openssl_encrypt($msg, $ciphering,$encryption_key,$option,$encryption_iv);

    // send encrypted mesage using PHPMailer
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'highrise444@outlook.com';
    $mail->Password = 'Highrise@123456';
    
    $mail->From= 'highrise444@outlook.com';
    $mail->FromName ='Highrise';
    $mail->addAddress($_POST['mail']);
 
    $mail->isHTML(true);
    $mail->Subject='Highrise Encrpyted Message';
    $mail->Body='<h1>The encrypted message is:<br>'.$encryption.'</h1>';
    
    $mail->send();
    echo 'Message has been sent!';
    echo "<br>";
    echo "Thank you for using Highrise to encrypt your message";
    
    } catch(Exception $e){
            echo "Message could not be sent! Error: {$mail->ErrorInfo}"; 
    }
}

?>