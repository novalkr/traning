<?php
/**
 * Console application entry script
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Console
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

$dirname = dirname(__FILE__);

//initialize environment
include_once $dirname . '/definitions.php';
include_once $dirname . '/env.php';
require_once YII_FRAMEWORK_PATH . '/yii.php';
include_once $dirname . '/bootstrap.php';

$yiic = YII_FRAMEWORK_PATH . '/yiic.php';
$config = $dirname . '/config/console.php';

// fix for fcgi
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
defined('YII_DEBUG') or define('YII_DEBUG', true);

//create and run application
require_once Yii::getPathOfAlias('cms.YConsoleApplication') . '.php';
if (isset($config)) {
    $app = new YConsoleApplication($config);
    $app->commandRunner->addCommands(YII_PATH . '/cli/commands');
    $env = @getenv('YII_CONSOLE_COMMANDS');
    if (!empty($env)) {
        $app->commandRunner->addCommands($env);
    }
} else {
    $app = new YConsoleApplication(array('basePath' => dirname(__FILE__) . '/cli'));
}

$app->run();