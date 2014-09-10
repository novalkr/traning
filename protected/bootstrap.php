<?php
/**
 * bootstrap.php is the application environment
 * initialization file
 * 
 * PHP version 5
 * 
 * @category  [APP]
 * @package   Global
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @author    Sosljuk Andrey <sosljuk@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

Yii::setPathOfAlias('vendors', VENDORS_PATH);
Yii::setPathOfAlias('jvibasta', JVIBASTA_PATH);
Yii::setPathOfAlias('cms', YII_CMS_PATH . '/cms');
Yii::setPathOfAlias('bootstrap', YII_CMS_PATH . '/cms/extensions/bootstrap');
Yii::setPathOfAlias('system', YII_FRAMEWORK_PATH);
if (defined('LITE_VERSION') && LITE_VERSION) {
    $dirname = dirname(__FILE__);
    Yii::setPathOfAlias('application', $dirname);
    Yii::setPathOfAlias('ext', $dirname . '/extensions');
}
 else {
     $dirname = dirname(__FILE__);
     Yii::setPathOfAlias('application', $dirname);
     Yii::setPathOfAlias('ext', $dirname . '/extensions');  
}