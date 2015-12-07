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
            'apikey' => '125057bac5924d2f17f8aa201611785a'
        ],

        'Luosimao' => [
            'apikey' => '3068537108b20193e88219871bafd491'
        ]
    ]
];

$yiiSms = \Yii::createObject($config);
$result = $yiiSms->send('13798164261', '【小贷集市】您的验证码是hello ');
var_dump($result);
