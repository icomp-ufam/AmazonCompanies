<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = array(
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => array('log'),
    'controllerNamespace' => 'app\commands',
    'components' => array(
        'cache' => array(
            'class' => 'yii\caching\FileCache',
        ),
        'log' => array(
            'targets' => array(
                array(
                    'class' => 'yii\log\FileTarget',
                    'levels' => array('error', 'warning'),
                ),
            ),
        ),
        'db' => $db,
    ),
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
