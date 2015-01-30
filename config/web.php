<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'lang'],
    'language' => 'en',
    'sourceLanguage' => 'en',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'test',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'loginUrl' => ['/user/login'],
//            'enableAutoLogin' => true,
        ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable' => 'local_source_message',
                    'messageTable' => 'local_message',
                ],
                'yii' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable' => 'local_source_message',
                    'messageTable' => 'local_message',
                ],                
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@app/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => [
                        'app' => 'app.php'
                    ]
                ],
//                'yii' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => "@app/messages",
//                    'sourceLanguage' => 'en_US',
//                    'fileMap' => [
//                        'yii' => 'yii.php'
//                    ]
//                ]
            ]
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'yyyy-M-dd',
            'datetimeFormat' => 'yyyy-M-dd H:i:s',
            'timeFormat' => 'H:i:s',],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'authManager' => [
            //'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
            'class' => 'yii\rbac\DbManager',
//            'defaultRoles' => ['guest'],
        ],
        'lang' => [
            'class' => 'harlangray\language\Language',
            'queryParam' => 'lang',
  
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'user/security/logout',
            'user/security/login',
//            'site/login'
        // add or remove allowed actions to this list
        ]
    ],
    'params' => $params,
    'modules' => [

//                    'controllerMap' => [
//                 'assignment' => [
//                    'class' => 'mdm\admin\controllers\AssignmentController',
//                    'userClassName' => 'dektrium\user\models\User',
//                    'idField' => 'id'
//                ]
//            ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'enableRegistration' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ]
];

if (YII_ENV_DEV) {
     // configuration adjustments for 'dev' environment
     $config['bootstrap'][] = 'debug';
     $config['modules']['debug'] = 'yii\debug\Module';

     $config['bootstrap'][] = 'gii';
//    $config['modules']['gii_harlan'] = [
//        'class' => 'yii\gii_harlan\Module',
//        'allowedIPs' => ['127.0.0.1', '::1',],
//           'generators' => [
//                'crud'   => [
////                    'class'     => 'yii\gii_harlan\generators\crud\Generator',
////                    'templates' => ['harlan' => '@app/templates/crud_harlan']
//                ]
//            ]
//        
//    ];

     $config['modules']['gii'] = [
         'class' => 'yii\gii\Module',
         'allowedIPs' => ['127.0.0.1', '::1',],
//           'generators' => [
////                'crud'   => [
////                    'class'     => 'yii\gii_harlan\generators\crud\Generator',
////                    'templates' => ['harlan' => '@app/templates/crud_harlan']
//                ]
//            ]
     ];
}

return $config;
