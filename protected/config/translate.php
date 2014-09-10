<?php

$appPath = dirname(__FILE__) . '/..';

return array(
    'sourcePath' => $appPath,
    'messagePath' => $appPath . '/messages',
    'languages' => array('en', 'ru'),
    'fileTypes' => array('php', 'tpl'),
    'exclude' => array(
        '/extensions',
        '/modules',
        '/messages',
        '/commands',
        '.svn',
    ),
);