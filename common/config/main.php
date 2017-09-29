<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=59.110.49.162;dbname=funs',
            'username' => 'iboxlucky',
            'password' => '123456',
            'charset' => 'utf8',
    	],
    ]
];
