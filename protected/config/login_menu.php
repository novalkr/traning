<?php
/**
 * Admin menu items configuration
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Main.config
 * @author    Kristina Babich <kristina@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

$user    = Yii::app()->user;
$isGuest = $user->isGuest;
$route   = Yii::app()->controller->route;

$ret = array(
    array(
        'label' => Yii::t('menu', 'Home'),
        'url'   => array('/site/admin'),
    ),
    array(
        'label' => Yii::t('menu', 'Register'),
        'url' => array('/core/auth/registration'),
        'visible' => Yii::app()->user->isGuest
    ),
    array(
        'label' => Yii::t('menu', 'Login'),
        'url' => array('/core/auth/login'),
        'visible' => Yii::app()->user->isGuest
    ),
    array(
        'label' => Yii::t('menu', 'Password recovery'),
        'url' => array('/core/auth/passwordRecovery'),
        'visible' => Yii::app()->user->isGuest
    ),
);

return $ret;
