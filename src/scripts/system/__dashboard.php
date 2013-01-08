<?php

include_once AppRoot . AppController . "system/c__dashboardController.php";


$dashboardObj=new c__dashboardController();
$dashboardObj->id=$get['id'];

$dashboardObj->getDashboard();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];




$content_details_array["page"]["heading"]=ucwords($dashboardObj->data['dashboard']['title']);

$content_details_array["page"]["title"]=ucwords($dashboardObj->data['dashboard']['title']);


 $content_details_array["dashboard"]["data"]=$dashboardObj->data;

?>
