<?php
/**
 * build script file.
 *
 * This is a command line script that provides various commands
 * for building an Yii release.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @version $Id: build 2531 2010-10-06 14:10:24Z qiang.xue $
 */

$root=dirname(__FILE__);
require_once $root . '/env.php';
set_include_path(get_include_path() . PATH_SEPARATOR . VENDORS_PATH);

require_once('PHPUnit/Runner/Version.php');
if(version_compare(PHPUnit_Runner_Version::id(), '3.5.0RC1')>=0)
    require_once('PHPUnit/Autoload.php');

$config=array('basePath'=>$root);
require_once(YII_FRAMEWORK_PATH . '/yiic.php');
