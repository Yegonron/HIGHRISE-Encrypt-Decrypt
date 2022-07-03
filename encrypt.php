<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

if(isset($_POST['send'])){

    try {
    $receiver = $_POST['receiver'];
    //$email = $_POST['mail'];
    $msg = $_POST['message'];
    $messagebird = new MessageBird\Client('vNwLibeZOnPetAxwHJeXWmmiQ');//use live key
    $message = new MessageBird\Objects\Message;
    $message->originator = '+254707621524';
    $message->recipients = [ $receiver];
    $encryption_key = "hs$[9FwR}}";//set key here
    $message->body = "Decrypt message using this key:".$encryption_key;
    $response = $messagebird->messages->create($message);
    var_dump($response);

    $ciphering = "AES-128-CTR"; //stores the cipher method
    $option = 0; //holds the bitwise disjunction of the flags
    $encryption_iv = '1234567890123456'; //holds the initialization vector  which is not null
    $encryption = openssl_encrypt($msg, $ciphering,$encryption_key,$option,$encryption_iv);

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'highrise696@gmail.com';
    $mail->Password = 'Highrise123456';
    
    $mail->From= 'highrise696@gmail.com';
    $mail->FromName ='Highrise';
    $mail->addAddress($_POST['mail']);
    $mail->addAddress('yegonronald9720@gmail.com');
 
    $mail->isHTML(true);
    $mail->Subject='Highrise Encrpyted Message';
    $mail->Body='<h1>The encrypted message is:<br>'.$encryption.'</h1>';
    
    $mail->send();
    echo 'Message has been sent!';
    echo "<br>";
    echo "Thank you for using Highrise to encrypt";
    
    } catch(Exception $e){
            echo "Message could not be sent! Error: {$mail->ErrorInfo}"; 
    }
}

?>