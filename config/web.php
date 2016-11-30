<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'id' => 'Rental Erp',
    'name' => 'Rental Erp',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-Ru',
    'modules' => [
        'cpanel' => [
            'class' => 'app\modules\cpanel\CpanelModule',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '36Urp0xJc3rFPUrC3fHSJ_ifHDSpJRVa',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'class' => 'yii\web\User',
            'loginUrl' => ['/admin/default/login'],
            'enableAutoLogin' => true
        ],
       /* 'user' => [
            'class' => 'app\modules\user\UserModule',
            'loginSessionDuration' => 2592000,
        ], */
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
                'app' => [ 'class' => 'yii\i18n\PhpMessageSource',
                             'basePath'=>'@app/messages',  ]
           ]

        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'cpanel/default',
                'login' => 'cpanel/default/login',
                'dashboard' => 'cpanel/default/dashboard'
            ],
        ],
        'fileStorage' => [
            'class' => \trntv\filekit\Storage::className(),
            'baseUrl' => '/web/uploads/source',
            'filesystem'=> function() {
                $adapter = new \League\Flysystem\Adapter\Local(dirname(__DIR__) . '/web/uploads/source');
                return new League\Flysystem\Filesystem($adapter);
            }
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
   // $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

if(file_exists(__DIR__ . '/db_local.php')){
    $config['components']['db'] = require(__DIR__ . '/db_local.php');
}

return $config;
