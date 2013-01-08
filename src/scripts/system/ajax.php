<?php

//$sql=  openssl_encrypt($_GET["q"],EncryptMethod,EncryptSalt,false,EncryptIV);
define('AppRoot', dirname(dirname(dirname(dirname(__FILE__)))));
include_once AppRoot . '/inc/config/config.php';
include_once AppRoot . AppModel . 'cModel.php';

$db = new cModel();
if ($_GET["q"]) {
    $db->query = str_replace('{$id}', $_GET['id'], base64_decode($_GET["q"]));
} elseif ($_GET["unique"]) {
    $db->query = 'Select ' . $_GET["unique"] . ' from ' . $_GET["table"] . ' where ' . $_GET["unique"] . "='" . $_GET["current_value"] . "'";
} elseif ($_GET["dblist"]) {
    $data = $db->getDBList($_GET["dblist"], $_GET["databasehost"], $_GET["databaseuser"], $_GET["databasepass"], $_GET["databasename"], $_GET["databaseport"]);
}

echo json_encode($data);
?>
