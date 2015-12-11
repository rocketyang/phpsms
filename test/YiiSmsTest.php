<?php
require('./../vendor/autoload.php');
require('./../vendor/yiisoft/yii2/Yii.php');

use Toplan\PhpSms\Sms;

$config = [

    'class' => 'Toplan\PhpSms\YiiSms',

    'agentsName' => [
        'YunPian' => '1 backup',
        'Luosimao' => '0 backup'
    ],

    'agentsConfig' => [
        'YunPian' => [
            'apikey' => '125057bac5xxxxxxxxjjja201611785a'
        ],

        'Luosimao' => [
            'apikey' => '3068537108b2xxxxxxe88219871bafd491'
        ]
    ]
];

$yiiSms = \Yii::createObject($config);
$result = $yiiSms->send('13798164261', '您的验证码是hello ');
print_r($result);
