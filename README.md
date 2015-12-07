# YiiSms

  yii2与phpsmshttps://github.com/toplan/phpsms 相结合。

支持的服务商有:

| 服务商 | 模板短信 | 内容短信 | 语音验证码 | 最低消费  |  最低消费单价 |
| ----- | :-----: | :-----: | :------: | :-------: | :-----: |
| [Luosimao](http://luosimao.com)        | no  | yes |  yes    |￥850(1万条) |￥0.085/条|
| [云片网络](http://www.yunpian.com)       | no | yes  | yes    |￥55(1千条)  |￥0.055/条|
| [容联·云通讯](http://www.yuntongxun.com) | yes | no  | yes    |充值￥500    |￥0.055/条|
| [SUBMAIL](http://submail.cn)           | yes | no  | no      |￥100(1千条) |￥0.100/条|
| [云之讯](http://www.ucpaas.com/)        | yes | no  | yes     |            |￥0.050/条|


# 安装

    ```
    composer require 'rocketyang/phpsms:dev-master'
    ```

# 快速上手

### 1. Yii配置

    可以作为component组件加载到yii2现有的components;

    ```
    sms => [

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

    ```


### 2. 超简单的语法糖

    ```
    $sms = Yii::$app->get('sms');
    $sms->send('13798164261', 'hello【云片网】');
    ```




