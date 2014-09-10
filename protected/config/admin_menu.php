<?php
/**
 * Admin menu items configuration
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   App.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

$user    = Yii::app()->user;
$isGuest = $user->isGuest;
$route   = Yii::app()->controller->route;

$ret = array(
    array(
        'label' => 'Home',
        'url'   => array('/site/admin'),
    ),
    array(
        'label' => 'Modules',
        'items' => array(
            array(
                'label' => Yii::t('menu', 'Pages'),
                'url' => array('/static/page/admin'),
                'visible' => $user->checkAccess(YPageController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Users'),
                'url' => array('/users/user/admin'),
                'visible' => $user->checkAccess(YUserController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Parameters'),
                'url' => array('/core/module/admin'),
                'visible' => $user->checkAccess(YModuleController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Roles'),
                'url' => array('/srbac/authitem/frontpage'),
                'visible' => $user->checkAccess(Yii::app()->getModule('srbac')->superUser),
            ),
            array(
                'label' => Yii::t('menu', 'Languages'),
                'url' => array('/core/language/admin'),
                'visible' => $user->checkAccess(YLanguageController::TASK_MANAGE),
            ),
        ),
    ),
);

return $ret;
