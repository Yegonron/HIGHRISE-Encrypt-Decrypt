<?php

$key = $_POST['secret_key'];
$decryption_key = "hs$[9FwR}}";

if(isset($_POST['decrypt'])&&($key==$decryption_key)){
    $msg = $_POST['text'];
    $ciphering = "AES-128-CTR";
    $option = 0;
    $decryption_iv = '1234567890123456';
    
    $decryption = openssl_decrypt($msg, $ciphering,$decryption_key,$option,$decryption_iv);

    echo "Decrypted Data :" .$decryption;
    echo "<br>";
    echo "Thank you for using Highrise to decrypt";

}

?>