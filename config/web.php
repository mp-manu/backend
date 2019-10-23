<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        [
            'class' => 'app\components\LanguageSelector',
            'supportedLanguages' => ['en', 'ru'],
        ],
    ],
    'aliases' => [
        '@uploads' => '/uploads',
        '@img' => '/img',
        '@uploadsroot' => $_SERVER['DOCUMENT_ROOT'].'/uploads',
        '@imgroot' => $_SERVER['DOCUMENT_ROOT'].'/img',
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',

    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'tD3UwxiOg2fUwvZRX9rod9-OcMvOZJ8u',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => '/page/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'techarsenal-smolensk@yandex.ru',
                'password' => 'smolensk',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
//        'settings' => [
//            'class' => 'yii2mod\settings\components\Settings',
//        ],
        'settings' => [
            'class' => 'app\components\Settings',
        ],
        'images' => [
            'class' => 'app\components\Images',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'all*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
                'yii2mod.settings' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/settings/messages',
                ],
                'yii2mod.rbac' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/rbac/messages',
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'page/service/<alias>' => 'page/service',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module'],

        'settings' => [
            'class' => 'yii2mod\settings\Module',
            'layout' => '@app/modules/admin/views/layouts/main'
        ],
        'rbac' => [
            'class' => 'yii2mod\rbac\Module',
            'layout' => '@app/modules/admin/views/layouts/main'
        ],
    ],
    'as access' => [
        'class' => yii2mod\rbac\filters\AccessControl::className(),
        'allowActions' => [
            'site/*',
            'page/*',
            'request/*',
            'admin/main/login',
        ]
    ],
    'params' => $params,
];

//if (YII_ENV_DEV) {
//
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];
//
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
//}

return $config;
