<?php
/**
 * Environment sample configuration
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Global
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

define('ENVIRONMENT', ENV_PRODUCTION);

$vendorsPath = dirname(__FILE__) . '/vendors';

define('YII_FRAMEWORK_PATH', $vendorsPath . '/yii/framework');
define('VENDORS_PATH', $vendorsPath);
define('JVIBASTA_PATH', $vendorsPath . '/jvibasta');
define('YII_CMS_PATH', $vendorsPath . '/yii-cms');
define('UPLOAD_DIR', dirname(__FILE__) . '/../upload');

defined('YII_LITE_VERSION') || define('YII_LITE_VERSION', false);
defined('LITE_VERSION') || define('LITE_VERSION', false);
defined('YII_DEBUG') || define('YII_DEBUG', true);
defined('LINK_ASSETS') || define('LINK_ASSETS', false);
defined('YII_TRACE_LEVEL') || define('YII_TRACE_LEVEL', 3);

date_default_timezone_set('Europe/Kiev');