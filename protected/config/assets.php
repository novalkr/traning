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
        'depends' => array('mvc', 'jquery.form', 'bootstrap', 'buttons.panel'),
    ),
    'admin' => array(
        'js' => array(
        ),
        'depends' => array('common'),
    ),
    'frontend' => array(
        'basePath' => 'application.assets',
        'css' => array(
            'css/main.css',
            'css/ie.css',
            'css/form.css',
            'css/screen.css',
            'css/mainmenu.css',//main menu style
            
        ),
        'depends' => array('common'),
    ),
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
      
    
);

$commonPack = include Yii::getpathOfAlias('common') . '/assets.php';
$cms = include Yii::getPathOfAlias('cms') . '/assets.php';
$cms=CMap::mergeArray($cms,$commonPack);
return CMap::mergeArray(
    include Yii::getPathOfAlias('jvibasta') . '/assets.php',
    $cms,
    $self
);