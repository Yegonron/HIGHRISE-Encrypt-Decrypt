<?php

if(isset($_POST['decrypt'])){
    $msg = $_POST['text'];
    $ciphering = "AES-128-CTR";
    $option = 0;
    $decryption_iv = '1234567890123456';
    $decryption_key =  $_POST['secret_key'];
    $decryption = openssl_decrypt($msg, $ciphering,$decryption_key,$option,$decryption_iv);

    echo "Decrypted Message: " .$decryption;
    echo "<br>";
    echo "Thank you for using Highrise to decrypt message";

}

?>