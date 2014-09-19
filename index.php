<?php
/**
 * index.php is file with web application bootstrap
 * 
 * PHP version 5
 * 
 * @category  [APP]
 * @package   Web
 * @author    Marilev Evgeniy <marilev@jviba.com>

 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */
 header('Content-Type: text/html; charset=utf-8');
$rootdir = dirname(__FILE__);

//initialize environment
include_once $rootdir . '/protected/definitions.php';
require_once $rootdir . '/protected/env.php';
require_once YII_FRAMEWORK_PATH
           . (defined('YII_LITE_VERSION') && YII_LITE_VERSION ? '/yiilite.php' : '/yii.php');
include_once $rootdir . '/protected/bootstrap.php';
if (defined('LITE_VERSION') && LITE_VERSION) {
    $config = require $rootdir . '/protected/config/main.php';
    foreach ($config['import'] as $alias) {
        Yii::import($alias);
    }
    require_once $rootdir . '/protected/runtime/lite.php';
} else {
    require_once YII_CMS_PATH . '/cms/YWebApplication.php';
}

$config = $rootdir . '/protected/config/main.php';
$app = new YWebApplication($config);
$app->run();