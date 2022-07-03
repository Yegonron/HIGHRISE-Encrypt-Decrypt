<?php
require_once 'vendor/autoload.php';
if(isset($_POST['send'])){

    try {
    $receiver = $_POST['receiver'];
    $mail = $_POST['mail'];
    $msg = $_POST['message'];
    $messagebird = new MessageBird\Client('dn3dLyDbz5p6sewbt51yHp71q');//use MessageBird live key
    $message = new MessageBird\Objects\Message;
    $message->originator = '+254707621524';
    $message->recipients = [ $receiver];
    $encryption_key = "hs$[9FwR}}";//set key here
    $message->body = $encryption_key;
    $response = $messagebird->messages->create($message);
    var_dump($response);

    $ciphering = "AES-128-CTR"; //stores the cipher method
    $option = 0; //holds the bitwise disjunction of the flags
    $encryption_iv = '1234567890123456'; //holds the initialization vector  which is not null
    $encryption = openssl_encrypt($msg, $ciphering,$encryption_key,$option,$encryption_iv);

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'highrise696@gmail.com';
    $mail->Password = 'Highrise123456';
    
    $mail->setFrom('highrise696@gmail.com');
    $mail->FromName = "Highrise";
    $mail->addAddress($_POST['mail']);
    
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