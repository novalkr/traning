<?php

/**
 * Configuration file for application assets.
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */
$self = array(

    'mvc' => array(
        'basePath' => 'jvibasta.extensions.widgets.assets',
        'js' => array('jquery.form.js'),
        'depends' => array('jquery.ui', 'mvc.core'),
    ),
    'common' => array(
        'basePath' => 'application.assets',
        'depends' => array('mvc', 'jquery.form', 'bootstrap',/*'bootstrap3',*/ 'buttons.panel'),
    ),
    'admin' => array(
        'js' => array(),
        'depends' => array('common'),
    ),
    'frontend' => array(
        'basePath' => 'application.assets',
        'css' => array(
            'css/main.css',
            'css/ie.css',
            'css/form.css',
            'css/screen.css',
            'css/mainmenu.css', //main menu style
        //    'css/bootstrap.min.css', //Bootstrap 3
        ),
        //'js'=>array(
        //    'js/bootstrap.min.js',//Bootstrap 3
        //    ),
        
        'depends' => array('common'),
    ),
    /*
    'bootstrap3' => array(
        'basePath' => 'cms.extensions.yiibooster.assets.bootstrap',
        'css' => array(
            
            'css/bootstrap.min.css',
        ),
        'js' => array(
            'js/bootstrap.min.js',
        ),
       // 'depends' => array('jquery'),
    ),
     * 
     */
    //init jviba logo
    /*
      'widgets' => array(
      'basePath' => 'application.assets',
      //'basePath' => 'common.assets',
      //common.widgets.assets'
      'depends' => array(
      'widgets.JvibaLogo',
      //'widgets.ContactsBar',
      //'widgets.PopupMessage',
      //'widgets.JuiDialog',
      //'widgets.StickyScrollWidget',
      //'widgets.SliderListView',
      ),
      ),
     */
    /*
    'bootstrap' => array(
        'basePath' => 'cms.extensions.yiibooster.assets',
        'css' => array(
  
            'css/bootstrap.min.css',
        ),
        //'depends' => array('common'),
    ),
    */
);

$commonPack = include Yii::getpathOfAlias('common') . '/assets.php';
$cms = include Yii::getPathOfAlias('cms') . '/assets.php';
$cms = CMap::mergeArray($cms, $commonPack);
return CMap::mergeArray(
                include Yii::getPathOfAlias('jvibasta') . '/assets.php', $cms, $self
);
