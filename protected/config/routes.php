<?php
/**
 * URL manager component's rules configuration
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */
return array(
    
    //authentication and authorization routes
    'login' => 'core/auth/login',
    'registration' => 'core/auth/registration',
    'activate' => 'core/auth/activate',
    'logout' => 'core/auth/logout',
    'passwordRecovery' => 'core/auth/passwordRecovery',
    'passwordChange' => 'core/auth/passwordChange',
    
    //static page routes
    array(
        'class' => 'YPageUrlRule',
        'template' => 'page/{sefPart}',
        'route' => 'static/page/view',
        'pattern' => 'page/<sefPart:[\w+-]+>'
    ),
    //article routes
    array(
        'class' => 'YArticleUrlRule',
        'template' => '{category}/{sefPart}',
        'route' => 'articles/article/view',
        'pattern' => '<category:[\w-+]+>/<sefPart:[\w-+]+>'
    ),
    array(
        'class' => 'YArticleWorldUrlRule',
        'requestPrimaryParameter' => 'categories',
        'template' => '{sefPart}',
        'route' => 'articles/article/index',
        'pattern' => '<sefPart:[\w-+]+>',
        'append' => false,
    ),
    array(
        'class' => 'YArticleCategoryUrlRule',
        'requestPrimaryParameter' => 'categories',
        'template' => '{world}/{sefPart}',
        'route' => 'articles/article/index',
        'pattern' => '<world:[\w-+]+>/<sefPart:[\w-+]+>'
    ),
    
    //voluntary url routes
//    array(
//        'class' => 'YVoluntaryUrlRule',
//        'pattern' => '',
//        'route' => array(
//            'YPage' => 'static/page/view',
//        ),
//    ),
);