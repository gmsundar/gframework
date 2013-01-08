<?php

/* * ***
 * Created by : G.M.Sundar
 *
 * *** */
include_once 'user_config.php';
/**
 * Server Configurations
 */
ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('html_errors', On);
//ini_set('expose_php', Off);
//ini_set('output_buffering',40960);
//ini_set('max_execution_time',40);
ini_set('default_charset', 'utf-8');
//ini_set('session.save_path','../../tech/sessions');


/**
 * Commercial
 */
define('CompanyName', 'GS');
define('CompanyURL', 'http://www.geotekh.com');

/**
 * Database
 */
$configArray["databasetype"] = $configArray["databasetype"] ? $configArray["databasetype"] : 'mysql';
$configArray["databasename"] = $configArray["databasename"] ? $configArray["databasename"] : 'gbase';
$configArray["databaseport"] = $configArray["databaseport"] ? $configArray["databaseport"] : "3306";
$configArray["databasehost"] = $configArray["databasehost"] ? $configArray["databasehost"] : "localhost";
$configArray["databaseuser"] = $configArray["databaseuser"] ? $configArray["databaseuser"] : "root";
$configArray["databasepass"] = $configArray["databasepass"] ? $configArray["databasepass"] : "sundar123";
$configArray["applang"] = $configArray["applang"] ? $configArray["applang"] : "en";
$configArray["apptextdirection"] = $configArray["apptextdirection"] ? $configArray["apptextdirection"] : "LTR";
$configArray["apptheme"] = "themes/" . $configArray["apptheme"] ? $configArray["apptheme"] : "greenschoolerp" . "/";
$configArray["appenvironment"] = $configArray["appenvironment"] ? $configArray["appenvironment"] : "Development";
$configArray["appurl"] = $configArray["appurl"] ? $configArray["appurl"] : "/framework1/";
$configArray["smtphost"] = $configArray["smtphost"] ? $configArray["smtphost"] : "smtp.google.com";
$configArray["smtpuser"] = $configArray["smtpuser"] ? $configArray["smtpuser"] : "meenakshi.sun20@gmail.com";
$configArray["smtppass"] = $configArray["smtppass"] ? $configArray["smtppass"] : "pass";
$configArray["smtpport"] = $configArray["smtpport"] ? $configArray["smtpport"] : "25";
$configArray["smtptimeout"] = $configArray["smtptimeout"] ? $configArray["smtptimeout"] : "4";
$configArray["smtpcrypto"] = $configArray["smtpcrypto"] ? $configArray["smtpcrypto"] : "no";
$configArray["sendmailpath"] = $configArray["sendmailpath"] ? $configArray["sendmailpath"] : "path";
$configArray["defaultemailfrom"] = $configArray["defaultemailfrom"] ? $configArray["defaultemailfrom"] : "smtp.google.com";
$configArray["apprequireslogin"] = $configArray["apprequireslogin"] ? $configArray["apprequireslogin"] : true;
$configArray["apphomepage"] = $configArray["apphomepage"] ? $configArray["apphomepage"] : "pay_rent";
$configArray["appname"] = $configArray["appname"] ? $configArray["appname"] : "GFlatManager";
$configArray["appdateformatphp"] = $configArray["appdateformatphp"] ? $configArray["appdateformatphp"] : "d/m/Y";

define('DataBaseName', $configArray["databasename"]);
define('DataBasePort', $configArray["databaseport"]);
define('DataBaseHost', $configArray["databasehost"]);
define('DataBaseUser', $configArray["databaseuser"]);
define('DataBasePass', $configArray["databasepass"]);
define('DataBaseType', $configArray["databasetype"]);
//define('DataBaseFile', $configArray["databasefile"]);


/**
 * Security
 */
define('EncryptMethod', 'AES-256-CBC');
define('EncryptSalt', '25c6c7ff35b9979b151f2136cd13b0ff');
define('EncryptIV', '1234567812345678');
define('EncryptOutput', false);

/**
 * Directories
 */
define('AppHost', $_SERVER['HTTP_HOST']);
define('AppProtocol', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
define('AppURL', AppProtocol . AppHost . '/framework1/');
define('PublicDir', 'src/');
define('IncDir', 'inc/');
define('AppController', '/' . IncDir . 'controller/');
define('AppCommon', '/' . IncDir . 'common/');
define('AppLanguage', '/' . IncDir . 'language/');
define('AppModel', '/' . IncDir . 'modal/');
define('AppJsURL', AppURL . PublicDir . 'js/');
define('AppCssURL', AppURL . PublicDir . 'css/');
define('AppImgURL', AppURL . PublicDir . 'img/');
define('AppChartURL', AppURL . PublicDir . 'chart/');
define('AppScriptURL', '/' . PublicDir . 'scripts/');
define('AppUploadsURL', AppRoot . '/' . PublicDir . 'uploads/');
define('AppViewUploadsURL', AppURL . '/' . PublicDir . 'uploads/');
define('Controllers', AppURL . IncDir . 'controller/');
define('SmartyTemplateDir', 'templates/');
define('AppAdminDirUrl', AppURL . IncDir . 'admin/');

/* * *
 * Language Settings
 */

define('AppLang', 'en/');
define('AppTextDirection', 'LTR');
define('AppLocalizationURL', '/' . PublicDir . 'localization/' . AppLang . '/');

/**
 * Apperance Settings
 */
define('AppTheme', 'themes/greenschoolerp/');
define('AppThemeCss', AppURL . PublicDir . SmartyTemplateDir . AppTheme . 'css/');
define('AppThemeJs', AppURL . PublicDir . SmartyTemplateDir . AppTheme . 'js/');
define('AppThemeImg', AppURL . PublicDir . SmartyTemplateDir . AppTheme . 'img/');
define('AppJqueryTheme', 'smoothness/');

//TODO Fix Log Problem

/**
 * Log Settings
 */
define('AppLogPath', '');
define('AppLogLevel', 2);
define('AppLogDateFormat', 'Y-m-d H:i:s');

/**
 * Environment
 */
define('AppEnvironment', 'Development');
/**
 * SMTP Settings
 */
define('SMTP_HOST', 'smtp.google.com');
define('SMTP_USER', 'meenakshi.sun20@gmail.com');
define('SMTP_PASS', '');
define('SMTP_PORT', '25');
define('SMTP_TIMEOUT', '5');
define('SMTP_CRYPTO', '');
define('SEND_MAIL_PATH', '');
define('DEFAULT_EMAIL_FROM', 'smtp.google.com');

/* * *
 * File operations
 */

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/**
 * Report Details
 */
define('AppJavaBridgeURL', 'http://127.0.0.1:8080/JavaBridge/java/Java.inc');
define('AppReportDesigns', AppRoot . '/' . IncDir . 'admin/reportdesigns/');

/**
 * Bugs Tracking
 */
define('AppsBugsURL', 'http://code.google.com/p/issueescalator/issues/list');

$__layouts = array(
    "1" => 'layout1',
    "2" => 'layout2',
    "3" => 'layout3',
    "4" => 'layout4',
    "5" => 'layout5'
);
define(AppLayout, $__layouts[1]);
/**
 * Application Settings
 *
 */
define('AppRequiresLogin', true);
define('AppHomePage', 'pay_rent');
define('AppName', 'GFlatManager');


define('AppDateFormatPhp', 'd/m/Y');
define('AppDateFormatJs', 'yy-mm-dd');
define('AppDateFormatDb', '%d/%m/%Y');
define('AppDateFormatDbInput', 'yyyy-mm-dd');
define('AppDateFormatTpl', '%d/%m/%Y');

//Paths
define("PathSystem", "system/");
define("PathWidget", "system/widgets/");
?>
