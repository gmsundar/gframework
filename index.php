<?php

define('AppRoot', dirname(__FILE__));
include_once AppRoot . '/inc/config/config.php';
include_once AppRoot . '/inc/smarty/Smarty.class.php';
include_once AppRoot . '/inc/smarty/SmartyValidate.class.php';
include_once AppRoot . '/inc/common/cUtils.php';
session_start();
$cUtils = new cUtils();
$post = $cUtils->cleanPost();
$get = $cUtils->cleanGet();

$smarty = new Smarty();

$__localization = array();

$languageFileName = AppRoot . AppLocalizationURL . $get['f'] . '.lang';
if (is_readable($languageFileName)) {
    include_once $languageFileName;
}

$content_details_array['__localization']['data'] = $__localization;
$ScriptFileName = AppRoot . AppScriptURL . $get['f'] . '.php';


if (is_readable($ScriptFileName)) {
    include_once "$ScriptFileName";
}

$smarty->assign('CompanyURL', CompanyURL);
$smarty->assign('CompanyName', CompanyName);
$smarty->assign('AppURL', AppURL);
$smarty->assign('AppViewUploadsURL', AppViewUploadsURL);
$smarty->assign('AppJsURL', AppJsURL);
$smarty->assign('AppCssURL', AppCssURL);
$smarty->assign('AppChartURL', AppChartURL);
$smarty->assign('AppImgURL', AppImgURL);
$smarty->assign('AppScriptURL', AppScriptURL);
$smarty->assign('AppTheme', AppTheme);
$smarty->assign('AppName', AppName);
$smarty->assign('AppJqueryTheme', AppJqueryTheme);
$smarty->assign('AppThemeCss', AppThemeCss);
$smarty->assign('AppThemeJs', AppThemeJs);
$smarty->assign('AppThemeImg', AppThemeImg);
$smarty->assign('AppDateFormatTpl', AppDateFormatTpl);
$smarty->assign('AppTextDirection', AppTextDirection);


$content_details_array['tplFileName'] = $get['f'] . ".tpl";
$content_details_array['request_type'] = $get['dataType'];
$content_details_array['current_page'] = $_SERVER['REQUEST_URI'];

$smarty->assign('content_details_array', $content_details_array);
$smarty->assign('dataType', $get['dataType']);



if ($get['dataType'] == '') {
    $smarty->display('layouts/' . AppLayout . '.tpl');
} else {
    $smarty->display($content_details_array['tplFileName']);
}
