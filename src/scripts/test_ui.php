<?php

include_once AppRoot . AppController . "cTest_ui.php";
$test_uiObj = new ctest_ui();
$content_details_array["formelements"]["number"] = array('name' => 'number', 'id' => 'number', 'value' => $test_uiObj->setDefaultValue('', $data[number]), 'mandatory' => 'on', 'class' => '', 'type' => 'textbox');
?>