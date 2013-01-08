<?php

//
//$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
//    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
//    $key = "This is a very secret key";
//    $text = "Meet me at 11 o'clock behind the monument.";
//    echo $text . "\n";
//
//    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
//    echo $crypttext . "\n";
//echo phpinfo();
define('AppRoot', dirname(dirname(__FILE__)));
include_once AppRoot . '/inc/config/config.php';
include_once AppRoot . '/inc/modal/cUserModel.php';
$cUserObj = new cUserModel();
$username = "";
$password = "";
$res = $cUserObj->validateLogin($username, $password);

print_r($res);
?>
