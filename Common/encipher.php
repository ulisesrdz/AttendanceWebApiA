<?php
// function for creating 
function doEncrypt($plain_text){
	//return hash('sha256' , $plain_text);
	return crypt($plain_text,'$2a$07$odinomesillystringforsalt$');
}
// function doEncrypt($plain_text){

    
//     $encryption_key = '1234567890Ulises%$%^%$$#$#';
//     $chiper = "AES-256-CBC";
//     $options = 0;
//     $iv_length=openssl_cipher_iv_length($chiper);
//     $iv = openssl_random_pseudo_bytes(16);
//     //$iv=    bin2hex($iv);
//     //echo $iv;
//     $encryption = openssl_encrypt($plain_text, $chiper, $encryption_key, $options, $iv);

//     // // Storing cipher method
//     // $ciphering = "BF-CBC";

//     // // Using OpenSSl encryption method
//     // $iv_length = openssl_cipher_iv_length($ciphering);
//     // $options = 0;
    
//     // // Using random_bytes() function which gives
//     // // randomly 16 digit values
//     // $encryption_iv = random_bytes($iv_length);

//     // // Alternatively, any 16 digits may be used
//     // // characters or numeric for iv
//     // $encryption_key = openssl_digest(php_uname(), 'MD5', true);

//     // $encryption = openssl_encrypt($plain_text, $ciphering, $encryption_key, $options, $encryption_iv);

//     return $encryption;
// 	//return hash('sha256' , $plain_text);    
//     //return openssl_encrypt()
// 	//return crypt($plain_text,'$2a$07$usesomesillystringforsalt$');
//     //return crypt($plain_text,'$2a$07$AsistenciaUlisesOdinforsalts$');
// }

function doDecrypt($plain_text){

  
    
    $encryption_key = '1234567890Ulises%$%^%$$#$#';
    $chiper = "AES-256-CBC";
    $options = 0;
    $iv_length=openssl_cipher_iv_length($chiper);
    $iv = openssl_random_pseudo_bytes(16);
    $iv=    bin2hex($iv);
    echo $iv;
    $decryptedData = openssl_decrypt($plain_text, $chiper, $encryption_key, $options, $iv);
    // Decryption of string process begins
    // $ciphering = "BF-CBC";
    // $iv_length = openssl_cipher_iv_length($ciphering);
    // $options = 0;
    // // Used random_bytes() that gives randomly
    // // 16 digit values
    // $encryption_iv = random_bytes($iv_length);

    // // Store the decryption key
    // $decryption_key = openssl_digest(php_uname(), 'MD5', true);

    // $decryption = openssl_decrypt($plain_text, $ciphering, $decryption_key, $options, $encryption_iv);


    return $decryptedData;
	//return hash('sha256' , $plain_text);    
    //return openssl_encrypt()
	//return crypt($plain_text,'$2a$07$usesomesillystringforsalt$');
    //return crypt($plain_text,'$2a$07$AsistenciaUlisesOdinforsalts$');
}