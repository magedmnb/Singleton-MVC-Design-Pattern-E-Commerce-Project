<?php

/**
 * @author maged
 * @copyright 2015
 */


ob_start();
session_start();
 

define('PROJECT_SCOPE', 'e-commerce');

if(PROJECT_SCOPE === 'e-commerce') {
    ini_set('display_errors', 0);
} else {
    ini_set('display_errors', 0);
}

error_reporting(E_ALL );


// Database Credentials
define('HOSTNAME', 'localhost');
define('DBNAME', 'itistore');
define('DBUSER', 'root');
define('DBPASS', '');

//payment 7
require_once 'anet_php_sdk/AuthorizeNet.php';
define("METHOD_TO_USE","AIM");
// $METHOD_TO_USE = "DIRECT_POST";         // Uncomment this line to test DPM


define("AUTHORIZENET_API_LOGIN_ID","7b6pbF7X8y9");    // Add your API LOGIN ID
define("AUTHORIZENET_TRANSACTION_KEY","6URB83abd4w7R786"); // Add your API transaction key
define("AUTHORIZENET_SANDBOX",true);       // Set to false to test against production
define("TEST_REQUEST", "FALSE");           // You may want to set to true if testing against production


// You only need to adjust the two variables below if testing DPM
define("AUTHORIZENET_MD5_SETTING","1200058?ahmad@%^&)!#");                // Add your MD5 Setting.
$site_root = "http://www.e-commerce.com/"; // Add the URL to your site


if (AUTHORIZENET_API_LOGIN_ID == "") {
    die('Enter your merchant credentials in config.php before running the sample app.');
}

// Paths
define('DS', DIRECTORY_SEPARATOR);//
define('PS', PATH_SEPARATOR);//;
define('APP_PATH', dirname(realpath(__FILE__)));// __DIR__
define('PUBLIC_PATH',$_SERVER['DOCUMENT_ROOT'].'/public/');//c;/wamp/www/e-commerce
define('TEMPLATE_PATH', APP_PATH . DS . 'templates');//c;/wamp/www/e-commerce/application
define('MODELS_PATH', APP_PATH . DS . 'models');
define('ADMIN_MODELS_PATH', APP_PATH . DS . 'models'.DS."Admin Models");
define('VIEWS_PATH', APP_PATH . DS . 'views');
define('CONTROLLERS_PATH', APP_PATH . DS . 'controllers');
define('ADMIN_CONTROLLERS_PATH', APP_PATH . DS . 'controllers'.DS."Admin Controller");
define('LIB_PATH', APP_PATH . DS . 'core');
define('PAYMENT_PATH', APP_PATH . DS . 'core'.DS.'anet_php_sdk');


//define html head content (css, js)
define("TEMPLATES_PATH", APP_PATH . DS . "templates" . DS);
define("ADMIN_TEMPLATES_PATH", APP_PATH . DS . "templates" . DS."Admin".DS);
define('CSS_PATH',PUBLIC_PATH.'css/');
define('JS_PATH',PUBLIC_PATH.'js/');

//domain constant(www.-------.com))
define("HOST_NAME",'http://'. $_SERVER['HTTP_HOST'].'/');

define('CSS_DIR',HOST_NAME.'css/');
define('JS_DIR',HOST_NAME.'js/');


$path = get_include_path().PS.MODELS_PATH.PS.LIB_PATH.PS.CONTROLLERS_PATH.PS.ADMIN_CONTROLLERS_PATH.PS.ADMIN_MODELS_PATH.PS.PAYMENT_PATH;
set_include_path($path);

// define an autoloader function

function itiAutoLoad($className)
{
    require_once strtolower($className) . '.class.php';
}

spl_autoload_register('itiAutoLoad');


$db = Database::getInstance();
$front = new FrontController();
$front->load();




//$temp->render();
//$temp->setCss();

?>