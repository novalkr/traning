<?php
/**
 * Main application configuration
 *
 * PHP version 5
 *
 * @category tran8
 * @package  Web.config
 * @author   Andrey Sosljuk <sosljuk@mail.ru>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://jviba.com/display/PhpDoc/yii-cms
 */

ini_set('mbstring.internal_encoding', 'UTF8');

$dirname = dirname(__FILE__);
$cmsModulesBasePath = Yii::getPathOfAlias('cms.modules');

$envConfig = $dirname . '/environments/' . ENVIRONMENT . '.php';
$environment = is_file($envConfig) ? include $envConfig : array();
$local = is_file($dirname . '/local.php') ? include $dirname . '/local.php' : array();

$routes = include $dirname . '/routes.php';
$packages = is_file($dirname . '/assets.php') ? include $dirname . '/assets.php' : array();

$conf = array(

    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',

    'name' => 'tran8',

    'language' => 'en',

    'preload' => array('log'),

    'import' => array(
        //application section
        'application.models.*',
        'application.models.base.*',
        'application.models.forms.*',
        'application.models.search.*',
        'application.components.*',
        'application.widgets.*',
        'application.controllers.*',
        //extensions section
        'jvibasta.extensions.components.*',
        'jvibasta.extensions.components.db.*',
        'jvibasta.extensions.components.storage.*',
        'jvibasta.extensions.components.storage.local.*',
        'jvibasta.thirdparty.packagecompressor.*',
        'jvibasta.thirdparty.cfile.*',
        'jvibasta.extensions.models.*',
        'jvibasta.extensions.filters.*',
        'jvibasta.extensions.web.*',
        'jvibasta.extensions.widgets.*',
        'jvibasta.extensions.widgets.menu.*',
        'jvibasta.extensions.widgets.social.*',
        'jvibasta.extensions.widgets.listview.*',
        'jvibasta.extensions.form.*',
        'jvibasta.extensions.caching.*',
        'jvibasta.extensions.utils.*',
        'jvibasta.thirdparty.yiidebugtb.*',
        'jvibasta.thirdparty.mailer.*',
        'jvibasta.extensions.models.interfaces.*',
        'jvibasta.extensions.models.behaviors.*',
        'jvibasta.extensions.models.sandbox.*',
        'jvibasta.thirdparty.image.*',
        'jvibasta.thirdparty.image.drivers.*',
        'jvibasta.extensions.components.social.*',
        'jvibasta.extensions.components.social.facebook.*',
        'jvibasta.extensions.models.tree.*',
        'jvibasta.extensions.cli.*',
        'jvibasta.thirdparty.widgets.EAjaxUpload.*',
        //notifications module section
        'jvibasta.modules.notifications.*',
        'jvibasta.modules.notifications.interfaces.*',
        'jvibasta.modules.notifications.models.*',
        'application.modules.notifications.models.*',
        //delivery module section
        'jvibasta.modules.delivery.*',
        'jvibasta.modules.delivery.interfaces.*',
        'jvibasta.modules.delivery.models.*',
        //cms core section
        'cms.modules.core.*',
        'cms.modules.core.components.*',
        'cms.modules.core.interfaces.*',
        'cms.modules.core.models.*',
        'cms.modules.core.models.behaviors.*',
        'cms.modules.core.behaviors.*',
        'cms.modules.core.controllers.*',
        'cms.modules.core.models.forms.*',
        'cms.modules.core.models.search.*',
        'cms.modules.core.widgets.*',
        'cms.modules.core.widgets.photoVideoUploader.*',
        //cms core section
        'cms.modules.core.*',
        'cms.modules.core.components.*',
        'cms.modules.core.interfaces.*',
        'cms.modules.core.models.*',
        'cms.modules.core.models.behaviors.*',
        'cms.modules.core.behaviors.*',
        'cms.modules.core.controllers.*',
        'cms.modules.core.models.forms.*',
        'cms.modules.core.widgets.*',
        //page module section
        'cms.modules.static.*',
        'cms.modules.static.models.*',
        'cms.modules.static.models.search.*',
        'cms.modules.static.components.*',
        'cms.modules.static.controllers.*',
        'cms.modules.static.models.forms.*',
        'cms.modules.static.widgets.*',
        //invite module section
        'cms.modules.invite.*',
        'cms.modules.invite.controllers.*',
        'cms.modules.invite.components.*',
        'cms.modules.invite.models.*',
        'cms.modules.invite.behaviors.*',
        //users module section
        'cms.modules.users.*',
        'cms.modules.users.models.*',
        'cms.modules.users.models.forms.*',
        'cms.modules.users.models.search.*',
        'cms.modules.users.controllers.*',
        //contacts module section
        'cms.modules.contacts.*',
        'cms.modules.contacts.models.*',
        'cms.modules.contacts.models.forms.*',
        'cms.modules.contacts.controllers.*',
        //articles module section
        'cms.modules.articles.*',
        'cms.modules.articles.components.*',
        'cms.modules.articles.interfaces.*',
        'cms.modules.articles.models.*',
        'cms.modules.articles.models.behaviors.*',
        'cms.modules.articles.controllers.*',
        'cms.modules.articles.models.forms.*',
        'cms.modules.articles.models.search.*',
        //comments module section
        'cms.modules.comments.*',
        'cms.modules.comments.components.*',
        'cms.modules.comments.interfaces.*',
        'cms.modules.comments.models.*',
        'cms.modules.comments.models.behaviors.*',
        'cms.modules.comments.controllers.*',
        'cms.modules.comments.models.forms.*',
        'cms.modules.comments.models.search.*',
        //facebook module section
        'cms.modules.facebook.*',
        'cms.modules.facebook.controllers.*',
        'cms.modules.facebook.components.*',
        'cms.modules.facebook.widgets.*',
        //google module section
        'cms.modules.google.*',
        'cms.modules.google.controllers.*',
        'cms.modules.google.components.*',
        //invite module section
        'cms.modules.invite.*',
        'cms.modules.invite.controllers.*',
        'cms.modules.invite.components.*',
        'cms.modules.invite.models.*',
        'cms.modules.invite.behaviors.*',
        //twitter module section
        'cms.modules.twitter.*',
        'cms.modules.twitter.controllers.*',
        'cms.modules.twitter.components.*',
        //vkontakte module section
        'cms.modules.vkontakte.*',
        'cms.modules.vkontakte.controllers.*',
        'cms.modules.vkontakte.components.*',

    ),

    'modules' => array(
        'core' => array(
            'class' => 'YCoreModule',
            'basePath' => $cmsModulesBasePath . '/core',
        ),
        'srbac' => array(
            'class' => 'jvibasta.modules.srbac.SrbacModule',
            'username' => 'email',
            'userid' => 'id',
            'alwaysAllowedPath' => 'application.config',
            'debug' => false,
            'superUser' => 'admin',
            'userclass' => 'YUser',
            'layout' => '//layouts/column1',
        ),
        'notifications' => array(
            'class' => 'NotificationsModule',
        ),
        'delivery' => array(
            'class' => 'DeliveryModule',
            'components' => array(
                'manager' => array(
                    'class' => 'DeliveryManager',
                    'config' => array(
                        'channels' => array(
                            array(
                                'class' => 'YEmailDeliveryChannel',
                            ),
                        ),
                        'fetch' => array(
                        ),
                    ),
                ),
            ),
        ),
        'core' => array(
            'class' => 'YCoreModule',
            'basePath' => $cmsModulesBasePath . '/core',
        ),
        'static' => array(
            'class' => 'YStaticModule',
            'basePath' => $cmsModulesBasePath . '/static',
            'controllerMap' => array(
                'page' => array(
                    'class' => 'YPageController',
                    'layout' => '//layouts/column2',
                    'customLayouts' => array(
                        'view' => '//layouts/column2_main',
                        'preview' => '//layouts/column2_main',
                        'admin' => '//layouts/column1',
                    )
                ),
            ),
        ),
        'invite' => array(
            'class' => 'YInviteModule',
            'basePath' => $cmsModulesBasePath . '/invite'
        ),
         'users' => array(
            'class' => 'YUsersModule',
            'basePath' => $cmsModulesBasePath . '/users',
            'controllerMap' => array(
                'user' => array(
                    'class' => 'cms.modules.users.controllers.YUserController',
                    'customLayouts' => array(
                        'admin' => '//layouts/column1',
                    ),
                ),
            ),
        ),
        'contacts' => array(
            'class' => 'YContactsModule',
            'basePath' => $cmsModulesBasePath . '/contacts'
        ),
        'articles' => array(
            'class' => 'YArticlesModule',
            'basePath' => $cmsModulesBasePath . '/articles',
            'controllerMap' => array(
                'article' => array(
                    'class' => 'YArticleController',
                    'layout' => '//layouts/column2',
                    'customLayouts' => array(
                        'view' => '//layouts/main',
                        'preview' => '//layouts/column2_main',
                        'admin' => '//layouts/column1',
                    )
                ),
            ),
        ),
        'comments' => array(
            'class' => 'YCommentsModule',
            'basePath' => $cmsModulesBasePath . '/comments',
            'controllerMap' => array(
                'comment' => array(
                    'class' => 'YCommentController',
                    'customLayouts' => array(
                        'view' => '//layouts/main',
                        'preview' => '//layouts/column2_main',
                        'admin' => '//layouts/column1',
                    ),
                ),
            ),
        ),
        'facebook' => array(
            'class' => 'YFacebookModule',
            'basePath' => $cmsModulesBasePath . '/facebook'
        ),
        'google' => array(
            'class' => 'YGoogleModule',
            'basePath' => $cmsModulesBasePath . '/google'
        ),
        'invite' => array(
            'class' => 'YInviteModule',
            'basePath' => $cmsModulesBasePath . '/invite'
        ),
        'twitter' => array(
            'class' => 'YTwitterModule',
            'basePath' => $cmsModulesBasePath . '/twitter'
        ),
        'vkontakte' => array(
            'class' => 'YVkontakteModule',
            'basePath' => $cmsModulesBasePath . '/vkontakte'
        ),

    ),

    'components' => array(
          'console' => array(
            'class' => 'jvibasta.extensions.cli.CConsole',
            'displayCommands' => false,
        ),
        'user' => array(
            'class' => 'cms.modules.core.components.YWebUser',
            'backendDefaultUrl' => '/static/page/admin',
            'allowAutoLogin' => true,
        ),
        'console' => array(
            'class' => 'CConsole',
        ),
        'session' => array(
            'class' => 'CHttpSession',
        ),
        'urlManager'=>array(
            'class' => 'cms.modules.core.components.YUrlManager',
            'urlFormat' => defined('LITE_BUILING') && LITE_BUILING ? 'get' : 'path',
            'showScriptName' => false,
            'rules' => $routes,
        ),
        'request' => array(
            'class' => 'cms.modules.core.components.YHttpRequest',
        ),
        'assetManager' => array(
            'class' => 'YAssetManager',
            'newDirMode' => 0777,
            'newFileMode' => 0644,
            'linkAssets' => defined('LINK_ASSETS') && LINK_ASSETS,
            'basePath' => $dirname . '/../../assets',
        ),
        'authManager' => array(
            'class' => 'application.components.AuthManager',
            //'defaultRoles' => array('guest'),
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'viewRenderer' => array(
            'class' => 'jvibasta.extensions.renderers.CPhpViewRenderer',
            'fileExtension' => '.tpl',
        ),
        'modelFactory' => array(
            'class' => 'cms.modules.core.components.YModelFactory',
            'properties' => array(
                'YLanguage' => array(
                    'usedInTables' => array(
                        'object_meta',
                        'page_info',
                        'article_info',
                    ),
                ),
            ),
        ),
        'mailer' => array(
            'class' => 'EMailer',
            'Host' => 'jviba.com',
            'Port' => 465,
            'SMTPAuth' => true,
            'SMTPSecure' => 'ssl',
            'Username' => 'mailer@jviba.com',
            'Password' => 'eiye9Ohw',
            'SMTPAuth' => true,
            'ContentType' => 'text/html',
            'From'     => 'contacts@jviba.com',
            'FromName' => 'JVIBA Webmaster',
            'CharSet'  => 'UTF-8',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=yii_cms',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            //'schemaCachingDuration' => 86400,
            'driverMap' => array(
                'mysqli' => 'CExtMysqlSchema',
                'mysql' => 'CExtMysqlSchema',
            ),
            'enableParamLogging' => false,
        ),
        'cache' => array(
            'class' => 'CFileCache',
            //'class' => 'CDummyCache',
        ),
        'glCache' => array(
            'class' => 'CFileCache',
            'keyPrefix' => 'global',
            'cachePath' => $dirname . '/../runtime/adapterCache',
        ),
        'cacheAdapterFactory' => array(
            'class' => 'jvibasta.extensions.caching.CacheAdapterFactory',
            'cacheComponentName' => 'glCache',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                /*array(
                    'class' => 'CWebLogRoute',
                ),*/
                /*array(
                    'class'=>'XWebDebugRouter',
                    'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
                    //'allowAjax'=>true,
                    'levels'=>'error, warning, trace, profile, info',
                ),*/
            ),
        ),
        'storage' => array(
            'class' => 'CLocalStorage',
            'root' => UPLOAD_DIR,
            'uri' => '/upload',
            'objects' => array(
                'file' => array(
                    'permissions' => 0644,
                ),
                'directory' => array(
                    'permissions' => 0755,
                ),
            ),
        ),
        'clientScript' => array(
            'class' => 'PackageCompressor',
            'enableCompression' => false,
            'packages' => $packages,
            'cssRegex' => array(
                '@(\.\./)less@i' => '{assetDir}/../less',
                '@(\.\./)img@i' => '{assetDir}/../img',
            ),
        ),
        'bootstrap' => array(
            'class' => 'Bootstrap',
            'responsiveCss' => false,
        ),
        'ajaxUploader' => array(
            'class' => 'YAjaxFileUploader',
        ),
        'formatter' => array(
            'class' => 'CFormatter',
        ),
    ),

    'params' => array(
        'admin' => array(
            'email'    => 'webmaster@jviba.com',
            'password' => 'admin'
        ),
        'email' => array(
            'admin' => 'webmaster@jviba.com',
        ),
        'cache' => array(
            'default' => array(
                'duration' => 30 * 24 * 3600,//1 month
            ),
        ),
        'contacts' => array(
            //please add recipients in the local config
        ),
    ),
);

return CMap::mergeArray(CMap::mergeArray($conf, $environment), $local);