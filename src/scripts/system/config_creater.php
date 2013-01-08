<?php

define('AppRoot', dirname(dirname(dirname(dirname(__FILE__)))));
include_once("../../../inc/config/config.php");
include_once("../../../inc/controller/cFormController.php");
include_once("../../../inc/controller/cXMLController.php");
include_once("../../../inc/smarty/Smarty.class.php");
$smarty = new Smarty();
$cFormCreate = new cFormController();
$xmlObj = new cXMLController();

if ($_POST) {


    foreach ($_POST as $key => $value) {
        $configDetails.='$configArray["' . $key . '"]="' . $value . '"' . ";\n";
    }


    file_put_contents(AppRoot . "/inc/config/user_config.php", "<?php \n" . $configDetails . "?>");
} else {




    if ($handle = opendir(AppRoot . "/src/templates/themes/")) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $themes[$entry] = $entry;
            }
        }
        closedir($handle);
    }
    if ($handle = opendir(AppRoot . '/' . PublicDir . 'localization/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $languages[$entry] = $entry;
            }
        }
        closedir($handle);
    }
    if ($handle = opendir(AppRoot . '/' . PublicDir . 'css/')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $jquerytheme[$entry] = $entry;
            }
        }
        closedir($handle);
    }
    $content_details_array["formelements"]['applang'] = array("name" => "applang", "id" => 'applang', 'required' => 'required', 'data' => $languages, "nodefaulttext" => true);
    $content_details_array["formelements"]['apptheme'] = array("name" => "apptheme", "id" => 'apptheme', 'required' => 'required', 'data' => $themes, "nodefaulttext" => true);
}


if ($_GET['type'] == '') {
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
    $smarty->display('system/config_creater.tpl');
    $smarty->display(AppTheme . 'footer.tpl');
} else {

}
?>
