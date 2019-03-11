<?php

$params = require __DIR__ . '/params.php';
//$db = require __DIR__ . '/db.php';
$db = file_exists(__DIR__ . '/db.php')
    ? (require __DIR__ . '/db_local.php')
    : (__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','test'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'modules' => [
        'test' => [
            'class' => 'app\modules\test\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'formatter'=>[
            'class'=>'\yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat'=>'php:d.m.Y H:i'
        ],
        'activity' => [
            'class' => \app\components\ActivityComponent::class,
            'activity_class' => '\app\models\Activity',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'enableSwiftMailerLogging' => true,
            'transport' => [
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.yandex.ru',
                'username' => 'geekbrains@onedeveloper.ru',
                'password' => 'qazWSX',
                'port' => '587',
                'encryption' => 'tls'
            ]
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
