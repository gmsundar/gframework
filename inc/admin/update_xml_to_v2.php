<?php

define('AppRoot', dirname(dirname(dirname(__FILE__))));
include_once("../config/config.php");
include_once("../controller/cFormController.php");
include_once("../controller/cXMLController.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$cformCreate = new cFormController();
$xmlObj = new cXMLController();
$xmlObj->file = "./formdesigns/" . "test_ui.xml";


$str = $xmlObj->xmlstrToArray();
$table_name = $str["tablenames"];
$new_file['page_settings']['tablenames'] = $table_name;
$new_file['page_settings']['pageheading'] = $str["pageheading"];
$new_file['page_settings']['pagetitle'] = $str["pagetitle"];
$new_file['page_settings']['viewallactions'] = urldecode((string)$str["viewallactions"][0]);
$new_file['page_settings']['viewactions'] = urldecode((string)$str["viewactions"][0]);
$new_file['page_settings']['beforewrite'] = urldecode((string)$str["beforewrite"][0]);
$new_file['page_settings']['afterwrite'] = urldecode((string)$str["afterwrite"][0]);
$new_file['tables'][$table_name]['layout'] = $str["layout"];
$new_file['tables'][$table_name]['reference_tables'] = $str["reference_tables"];
$new_file['tables'][$table_name]['child_tables'] = $str["child_tables"];
unset($str["tablenames"], $str["pageheading"], $str["pagetitle"], $str["layout"], $str["viewallactions"], $str["viewactions"], $str["beforewrite"], $str["afterwrite"], $str["reference_tables"], $str["child_tables"], $str["__columns"], $str["__layout"], $str["submit"]);

$current_column_name = "";
$count = 0;
foreach ($str as $key => $value) {
//echo $key."--".$count."</br>";

    if ($count === 0) {
        $current_column_name = $key;
        $new_file['tables'][$table_name]["columns"][$key]["display_name"] = $value;
        $new_file['tables'][$table_name]["columns"][$key]["add_edit_type"] = $str[$current_column_name . "_type"];
        $new_file['tables'][$table_name]["columns"][$key]["view_type"] = $str[$current_column_name . "_view_type"];
        $new_file['tables'][$table_name]["columns"][$key]["static_data"] = $str[$current_column_name . "_static_data"];
        $new_file['tables'][$table_name]["columns"][$key]["column_order"] = $str[$current_column_name . "_column_order"];
        $new_file['tables'][$table_name]["columns"][$key]["column_group"] = $str[$current_column_name . "_column_group"];
        $new_file['tables'][$table_name]["columns"][$key]["column_group_order"] = $str[$current_column_name . "_column_group_order"];
        $new_file['tables'][$table_name]["columns"][$key]["is_mandatory"] = $str[$current_column_name . "_mandatory"];
        $new_file['tables'][$table_name]["columns"][$key]["placeholder"] = $str[$current_column_name . "_placeholder"];
        $new_file['tables'][$table_name]["columns"][$key]["default_value"] = $str[$current_column_name . "_default_value"];
        $new_file['tables'][$table_name]["columns"][$key]["text_formatting"] = $str[$current_column_name . "_formatting_type"];
        $new_file['tables'][$table_name]["columns"][$key]["validation"] = $str[$current_column_name . "_error"];
        $new_file['tables'][$table_name]["columns"][$key]["validation_pattern"] = $str[$current_column_name . "_validation_pattern_value"];
        $new_file['tables'][$table_name]["columns"][$key]["javascript"] = @urlencode((string)$str[$current_column_name . "_dependentshowhide_condition"]);
        $new_file['tables'][$table_name]["columns"][$key]["view_all_display"] = $str[$current_column_name . "_viewall"];
        $new_file['tables'][$table_name]["columns"][$key]["view_all_formula"] = $str[$current_column_name . "_viewallcolumns"];
        $new_file['tables'][$table_name]["columns"][$key]["dependent"] = $str[$current_column_name . "_dependent"];
        $new_file['tables'][$table_name]["columns"][$key]["dependent_query"] = $str[$current_column_name . "_dependent_query"];
    }
    $count++;

    if (stripos($key,'_dependent_query')) {
        $count = 0;
    }
}
$xmlObj->file = "./formdesigns/" . "test_ui_test.xml";
$xmlObj->data=$new_file;
$xmlObj->writeArrayToXML();
print_r($new_file);
?>
