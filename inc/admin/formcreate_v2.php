<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formcreate
 *
 * @author gt
 */
define('AppRoot', dirname(dirname(dirname(__FILE__))));
include_once("../config/config.php");
include_once("../controller/system/cFormController.php");
include_once("../smarty/Smarty.class.php");

$smarty = new Smarty();

$cFormCreate = new cFormController();
$cFormCreate->projectFilePath = AppRoot . "/" . IncDir . 'admin/';
$cFormCreate->filename = "test_ui";



if ($_POST) {
    $cFormCreate->tplPath = $smarty->template_dir;
    $cFormCreate->scriptsPath = AppRoot . AppScriptURL;
    $cFormCreate->controllerPath = AppRoot . AppController;
    $cFormCreate->langPath = AppRoot . AppLocalizationURL;


    $cFormCreate->properties = json_decode($_POST['result']);
//    print_r($cFormCreate->properties);
    $cFormCreate->html = $_POST['designer_hidden'];
    $cFormCreate->createPage();
    header("Location:formcreate_v2.php");
//    $cFormCreate->createView();
//    $cFormCreate->createScript();
//    $cFormCreate->createController();
//
//
//    file_put_contents(AppRoot . AppScriptURL . $_POST['page_settings']['tablenames'] . "_v2.php", $cFormCreate->scriptCode);
//
//    file_put_contents(AppRoot . AppController . 'c' . ucwords($_POST['page_settings']['tablenames']) . "Controller_v2.php", $cFormCreate->controllerScript);
//    file_put_contents(AppRoot . AppLocalizationURL . $_POST['page_settings']['tablenames'] . "_v2.lang", json_encode($cFormCreate->localizationStrings[AppLang]));
//
//    file_put_contents($smarty->template_dir . "/" . $_POST['page_settings']['tablenames'] . "_v2.tpl", $cFormCreate->viewScript);
//
//
//
//    echo "configuration saved successfully !!!!";
//    exit;
} else {


    $cFormCreate->loadProjectCode();

    $tabledata = $cFormCreate->getColumnDetails($cFormCreate->filename);

    $cFormCreate->properties = get_object_vars($cFormCreate->properties);

    foreach ($tabledata as $key => $value) {
        $columnname = $value['column_name'];

        //Source Data

        $data[$columnname]['table'] = $value['table_name'];
        $data[$columnname]['nullable'] = $value['is_nullable'];
        $data[$columnname]['default'] = $value['column_default'];
        $data[$columnname]['type'] = $value['data_type'];
        $data[$columnname]['maximum'] = $value['character_maximum_length'];
        $data[$columnname]['referencetabledetails'] = $value['referencetabledetails'];

        $properties = (array) $cFormCreate->properties[$columnname];

        //Result Data
        $rdata[$columnname]['table'] = $properties['table'] ? $properties['table'] : $value['table_name'];
        $rdata[$columnname]['mandatory'] = $properties['mandatory'];
        $rdata[$columnname]['edit_as'] = $properties['edit_as'];
        $rdata[$columnname]['view_as'] = $properties['view_as'];
        $rdata[$columnname]['view_all_as'] = $properties['view_all_as'];
        $rdata[$columnname]['view_calculation'] = $properties['view_calculation'];
        $rdata[$columnname]['view_all_calculation'] = $properties['view_all_calculation'];
        $rdata[$columnname]['add_as'] = $properties['add_as'];
        $rdata[$columnname]['place_holder'] = $properties['place_holder'];
        $rdata[$columnname]['default_value'] = $properties['default_value'];
        $rdata[$columnname]['display_name'] = $properties['display_name'] ? $properties['display_name'] : ucfirst(str_replace('_', ' ', $columnname));
        $rdata[$columnname]['javascript'] = $properties['javascript'];
        $rdata[$columnname]['add_on_fly'] = $properties['add_on_fly'];
        //validations
        $validation = (array) $properties['validation'];
        $rdata[$columnname]['validation']['number'] = $validation['number'];
        $rdata[$columnname]['validation']['email'] = $validation[''];
        $rdata[$columnname]['validation']['custom'] = $validation[''];
        $rdata[$columnname]['validation']['custom_pattern'] = $validation[''];
        $rdata[$columnname]['validation']['unique'] = $validation[''];


        $rdata[$columnname]['properties']['type'] = '';
        $rdata[$columnname]['properties']['min'] = '';
        $rdata[$columnname]['properties']['max'] = '';
        $rdata[$columnname]['properties']['step'] = '';
        $rdata[$columnname]['properties']['sequence_prepend'] = '';
        $rdata[$columnname]['properties']['sequence_append'] = '';


        //Events
        $events = (array) $properties['event'];
        $rdata[$columnname]['event']['type'] = $events['type'];

        //dependent
        $dependent = (array) $properties['dependent'];
        if (is_array($dependent[0])) {
            $i = 0;
            foreach ($dependent as $key => $value) {
                $dependent_temp = (array) $dependent[$i];
                $rdata[$columnname]['dependent'][$i]['cols'] = $dependent_temp['cols'];
                $rdata[$columnname]['dependent'][$i]['from'] = $dependent_temp['from'];
                $rdata[$columnname]['dependent'][$i]['where'] = $dependent_temp['where'];
                $rdata[$columnname]['dependent'][$i]['orderby'] = $dependent_temp['orderby'];
                $rdata[$columnname]['dependent'][$i]['applyto'] = $dependent_temp['applyto'];
                $i++;
            }
        } else {
            $rdata[$columnname]['dependent'][0]['cols'] = "";
            $rdata[$columnname]['dependent'][0]['from'] = "";
            $rdata[$columnname]['dependent'][0]['where'] = "";
            $rdata[$columnname]['dependent'][0]['orderby'] = "";
            $rdata[$columnname]['dependent'][0]['applyto'] = "";
        }

        //Data
        //DB SQL
        $ctrldata = (array) $properties['data'];
        $rdata[$columnname]['data']['cols'] = $ctrldata['cols'];
        $rdata[$columnname]['data']['from'] = $ctrldata['from'];
        $rdata[$columnname]['data']['join'] = $ctrldata['join'];
        $rdata[$columnname]['data']['where'] = $ctrldata['where'];
        $rdata[$columnname]['data']['orderby'] = $ctrldata['orderby'];
        $staticdata = (array) $ctrldata['static'];
        $rdata[$columnname]['data']['static'] = $staticdata;
        //Static Data
    }

    //print_r($rdata);



    $content_details_array['formelements']['dbdata'] = $data;
    $content_details_array['formelements']['dbdatajson'] = json_encode($data);
    $content_details_array['formelements']['resultdatajson'] = json_encode($rdata);
    $content_details_array['formelements']['html'] = $cFormCreate->html;

//$tabledatajson="[";
//foreach(array_keys($tabledata) as $columnname){
//    $tabledatajson.="{ label:'".$columnname."'},";
//}
//$tabledatajson=rtrim($tabledatajson,",");
//$tabledatajson.="]";
//$content_details_array['formelements']['selectedtablescolumns']= json_encode($tabledatajson);
}

$smarty->assign('AppCssURL', AppCssURL);
$smarty->assign('AppImgURL', AppImgURL);
$smarty->assign('AppJsURL', AppJsURL);
$smarty->assign('AppTheme', AppTheme);
$smarty->assign('AppThemeCss', AppThemeCss);
$smarty->assign('AppThemeJs', AppThemeJs);
$smarty->assign('AppJqueryTheme', AppJqueryTheme);
$smarty->assign('AppThemeImg', AppThemeImg);
$smarty->assign('content_details_array', $content_details_array);
$smarty->display(AppTheme . 'header.tpl');
$smarty->display('system/formcreatev2.tpl');
$smarty->display(AppTheme . 'footer.tpl');

function makeDisplayName($columnName) {
    return ucwords(str_replace('_', ' ', $columnName));
}

function setDefaultValues($savedcolumndata, $default = "") {
    return $savedcolumndata ? $savedcolumndata : $default;
}

?>
