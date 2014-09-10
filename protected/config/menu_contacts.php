<?php

/**
 * Admin menu items configuration
 *
 * PHP version 5
 *
 * @category  JVIBA BLOG
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>, Shlang
 * @copyright 2013 JVIBA
 * @license   http://jviba.com/display/license proprietary
 * @link      http://jviba.com/display/PhpDoc
 */
$user = Yii::app()->user;
$isGuest = $user->isGuest;
$route = Yii::app()->controller->route;

$ret = array(
    array(
        'label' => '',                              // phone
        'url' => array('#'),
        'linkOptions' => array('style' => "background-position: 0 0px;"),
    ),
    array(                                          // login
        'label' => '',
        'url' => array('contactUs'),
        'linkOptions' => array('style' => "background-position: -25px 0;"),
    ),
    array(                                          // contact
        'label' => '',
        'url' => array('login'),
        'linkOptions' => array('style' => "background-position: -50px 0;"),
    ),
    array(
        'label' => '',
        'url' => array('#'),
        'linkOptions' => array('style' => "background-position: -75px 0;"),
    ),
//        array(                                      // logout
//        'label' => '',
//        'linkOptions' => array('style' => "background-position: -75px 0;"),    
//        'url' => array('logout'),
//        'visible' => !$isGuest,        
//    ),

);

return $ret;