<?php
require_once 'vendor/autoload.php';
if(isset($_POST['send'])){

    try {
    $receiver = $_POST['receiver'];
    $mail = $_POST['mail'];
    $msg = $_POST['message'];
    $messagebird = new MessageBird\Client('dn3dLyDbz5p6sewbt51yHp71q');//use live key
    $message = new MessageBird\Objects\Message;
    $message->originator = '+254707621524';
    $message->recipients = [ $receiver];
    $encryption_key = "hello";//set password here
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
    $mail->Username = 'yegonronald9720@gmail.com';
    $mail->Password = 'R0n.mecer972ostrath';
    
    $mail->setFrom($_POST['mail']);
    $mail->FromName = "Highrise";
    $mail->addAddress('yegonronald9720@gmail.com');
    $mail->addReplyTo($_POST['mail']);
    
    $mail->isHTML(true);
    $mail->Subject='Form Submission:';
    $mail->Body='<h1>Name :'.$_POST['mail'].'<br>Email: '.$_POST['mail']. '<br>Message: 
    '.$encryption.'</h1>';
    
    $mail->send();
    echo 'Message has been sent!';
    
    } catch(Exception $e){
            echo "Message could not be sent! Error: {$mail->ErrorInfo}"; 
    }
     }

?>