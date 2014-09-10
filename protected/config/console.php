<?php
/**
 * Main configuration for console application
 *
 * PHP version 5
 *
 * @category  [APP]
 * @package   Web.config
 * @author    Marilev Evgeniy <marilev@jviba.com>
 * @license   https://jviba.com/display/license proprietary
 * @link      https://jviba.com/display/PhpDoc
 */

ini_set('mbstring.intenal_encoding', 'UTF8');

$dirname = dirname(__FILE__);
Yii::setPathOfAlias('web', $dirname . '/../../');

$main = include $dirname . '/main.php';

$components = array(
    'db' => $main['components']['db'],
    'cache' => $main['components']['cache'],
    'cacheAdapterFactory' => $main['components']['cacheAdapterFactory'],
    'authManager' => $main['components']['authManager'],
    'modelFactory' => $main['components']['modelFactory'],
    'mailer' => $main['components']['mailer'],
    'viewRenderer' => $main['components']['viewRenderer'],
    'clientScript' => $main['components']['clientScript'],
    'assetManager' => $main['components']['assetManager'],
    'console' => array_merge(
        $main['components']['console'],
        array('displayCommands' => true)
    ),
    'log' => array(
        'class' => 'CLogRouter',
        'routes' => array(
            array(
                'class' => 'CFileLogRoute',
                'levels' => 'error, warning, trace, info',
            ),
        ),
    ),
);

return array(
    'basePath' => $dirname . '/../',
    'commandPath' => $dirname . '/../commands',
    'name' => '[APP] Console',
    'preload' => array('log'),
    'import' => array_merge(
        $main['import'],
        array(
            'jvibasta.extensions.cli.*',
            'jvibasta.thirdparty.httpclient.*',
            'jvibasta.thirdparty.httpclient.adapter.*',
            'jvibasta.extensions.rest.*',
            'jvibasta.extensions.rest.core.*',
            'jvibasta.extensions.rest.client.*',
            'jvibasta.extensions.rest.client.decoders.*',
        )
    ),
    'components' => $components,
    'commandMap' => array(
        'shell' => array(
            'class' => 'jvibasta.extensions.cli.ExtShellCommand',
            'config' => array(
                'model' => array(
                    'class' => 'system.cli.commands.shell.ModelCommand',
                    'templatePath' => $dirname . '/../commands/shell/templates/model',
                    'fixturePath' => false,
                    'unitTestPath' => false,
                ),
                'extmodel' => array(
                    'class' => 'jvibasta.extensions.cli.shell.ExtModelCommand',
                    'templatePath' => $dirname . '/../commands/shell/templates/extmodel',
                ),
                'crud' => array(
                    'class' => 'system.cli.commands.shell.CrudCommand',
                    'templatePath' => $dirname . '/../commands/shell/templates/crud',
                    'functionalTestPath' => false,
                ),
                'help' => array(
                    'class' => 'system.cli.commands.shell.HelpCommand',
                ),
            ),
        ),
        'migrate' => array(
            'class' => 'cms.modules.core.cli.YMigrateCommand',
            'migrationPath' => 'application.db.migrations',
            'templateFile' => 'application.commands.templates.migration',
            'excludeModules' => array('srbac', 'ulogin'),
            'interactive' => ENVIRONMENT == ENV_LOCAL,
        ),
        'recache' => array(
            'class' => 'jvibasta.extensions.cli.RecacheCommand',
            'sources' => array(
                'YPageUrlRule' => array(
                    'cacheComponentName' => 'cache',
                    'template' => 'page/{sefPart}',
                    'static/page/view',
                    'page/<sefPart:[\w+-]+>'
                ),
                'YPhoto' => array(
                    'cacheComponentName' => 'cache',
                ),
                'YObject' => array(
                    'cacheComponentName' => 'cache',
                ),
            ),
        ),
        'deploy' => array(
            'class' => 'jvibasta.extensions.cli.DeployCommand',
            //'applicationName' => 'blog.jviba.com',
            'compressPackages' => array(
                //'backend', 'frontend',
            ),
            'recacheSources' => array(
                'YPageUrlRule', 'YPhoto', 'YVideo', 'YObject',
            )
        ),
        'packages' => array(
            'class' => 'jvibasta.thirdparty.packagecompressor.PackagesCommand',
            'publicPath' => realpath($dirname . '/../../'),
        ),
    ),
    'modules' => $main['modules'],
    'params' => $main['params'],
);