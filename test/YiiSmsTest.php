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
            'apikey' => '122222343434324d2f17f8aa201611785a'
        ],

        'Luosimao' => [
            'apikey' => '3068537108b2xxxxxx71ba9e'
        ]
    ]
];

$yiiSms = \Yii::createObject($config);
$result = $yiiSms->send('13798164261', 'hello【云片网】');
var_dump($result);
