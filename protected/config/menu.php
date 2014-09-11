<?php
/**
 * Admin menu items configuration
 *
 * PHP version 5
 *
 * @category  JVIBA BLOG
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @copyright 2012 JVIBA
 * @license   http://jviba.com/display/license proprietary
 * @link      http://jviba.com/display/PhpDoc
 */

$user = Yii::app()->user;
$isGuest = $user->isGuest;
$route = Yii::app()->controller->route;

$ret = array(
    array(
        'label' => Yii::t('menu', 'Home'),
        'url'   => array('/site/admin'),
    ),
    array(
        'label' => Yii::t('menu', 'About'),
        'url'   => array('/page/about'),
    ),
    array(
        'label' => Yii::t('menu', 'Our Project'),
        'url'   => array('/articles/article'),
    ),
    array(
        'label' => Yii::t('menu', 'Our Services'),
        'url'   => array('page/service'),
    ),
    array(
        'label' => Yii::t('menu', 'Blog'),
        'url'   => 'http://blog',
    ),
    array(
        'label' => Yii::t('menu', 'Contacts'),
        'url'   =>  array('page/contacts'),
        //'url'   =>  array('static/page/4'),
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
                'label' => Yii::t('menu', 'Articles'),
                'url' => array('/articles/article/admin'),
                'visible' => $user->checkAccess(YArticleController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Categories'),
                'url' => array('/articles/category/admin'),
                'visible' => $user->checkAccess(YArticleCategoryController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Tags'),
                'url' => array('/articles/tag/admin'),
                'visible' => $user->checkAccess(YArticleTagController::TASK_MANAGE),
            ),
            array(
                'label' => Yii::t('menu', 'Comments'),
                'url' => array('/comments/comment/admin'),
                'visible' => $user->checkAccess(YCommentController::TASK_MANAGE),
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
                'url' => array('/srbac'),
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