<?php
require('./../vendor/autoload.php');
require('./../vendor/yiisoft/yii2/Yii.php');

use Toplan\PhpSms\Sms;

$config = [

    'class' => 'Toplan\PhpSms\YiiSms',

    'agentsName' => [
        'Log' => '5 backup',
        'Luosimao' => '7 backup'
    ],

    'agentsConfig' => [
        'Luosimao' => [
            'apiKey' => 'apiKey'
        ]
    ]
];

$yiiSms = \Yii::createObject($config);
$result = $yiiSms->send('13798164261', 'test');
var_dump($result);
