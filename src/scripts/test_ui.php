<?php

include_once AppRoot . AppController . "cTest_ui.php";
$test_uiObj = new ctest_ui();

print_r($_POST);
exit;






$content_details_array["formelements"]["text"] = array('name' => 'text', 'id' => 'text', 'value' => $test_uiObj->setDefaultValue('', $data['text']), 'mandatory' => 'checked', 'class' => '', 'type' => '');
$content_details_array["formelements"]["check_box"] = array('name' => 'check_box', 'id' => 'check_box', 'value' => $test_uiObj->setDefaultValue('', $data['check_box']), 'mandatory' => 'checked', 'class' => '');
$content_details_array["formelements"]["select_foregin"] = array('name' => 'select_foregin', 'id' => 'select_foregin', 'value' => $test_uiObj->setDefaultValue('', $data['select_foregin']), 'mandatory' => 'checked', 'class' => '', 'data' => $test_uiObj->getSelectData('__country', 'id,country_name', '', '', ''));
$content_details_array["formelements"]["photo"] = array('name' => 'photo', 'id' => 'photo', 'value' => $test_uiObj->setDefaultValue('', $data['photo']), 'mandatory' => 'checked', 'class' => '');
$content_details_array["formelements"]["number"] = array('name' => 'number', 'id' => 'number', 'value' => $test_uiObj->setDefaultValue('', $data['number']), 'mandatory' => 'checked', 'class' => '', 'type' => '');
$content_details_array["formelements"]["read_only"] = array('name' => 'read_only', 'id' => 'read_only', 'value' => $test_uiObj->setDefaultValue('', $data['read_only']), 'mandatory' => 'checked', 'class' => '', 'type' => '');
$content_details_array["formelements"]["date"] = array('name' => 'date', 'id' => 'date', 'value' => $test_uiObj->setDefaultValue('', $data['date']), 'mandatory' => 'checked', 'class' => '');
$content_details_array["formelements"]["radio"] = array('name' => 'radio', 'id' => 'radio', 'value' => $test_uiObj->setDefaultValue('', $data['radio']), 'mandatory' => 'checked', 'class' => '');
$content_details_array["formelements"]["select_array"] = array('name' => 'select_array', 'id' => 'select_array', 'value' => $test_uiObj->setDefaultValue('', $data['select_array']), 'mandatory' => 'checked', 'class' => '', 'data' => array('10' => '20', '30' => '40', '50' => '60'));
?>