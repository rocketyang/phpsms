<?php
namespace Toplan\PhpSms;

use Yii\base\Component;
use Toplan\TaskBalance\Balancer;

/**
 * yii sms版
 * @todo 支持hook, before与after
 * @todo 支持队列
 * Class YiiSms
 * @package Toplan\PhpSms
 */
class YiiSms extends Component
{
   /**
    * @var 可用代理名称
    */
   public $agentsName;

   
   /**
    * @var 代理配置
    */
   public $agentsConfig;
   
   /**
    * @var 是否启用队列 TODO
    */
   public $enableQueue;

   /**
    * @var 短信模板
    *   'to' => null,
    *    'templates' => [],
    *    'content' => '',
    *    'templateData' => [],
    *    'voiceCode' => null,
    */
   public $templates = false;

   /**
    * 初始化
    */
   public function init() 
   {
       if (empty($this->agentsConfig) || empty($this->agentsName)) {
           throw Exception('$agentsConfig and agentsName is required');
       }
       Sms::enable($this->agentsName);
       Sms::agents($this->agentsConfig);
   }


   /**
    * 简洁短信发送接口
    * @param $to 接收人
    * @param $content 短信内容
    * @param $是否入队列, 未实现
    * @return array 
    *    [
    *    'success' => false,
    *    'info'  => '',
    *    'code'  => 0
    *    ];
    *
    */
   public function send($to, $content, $queue=true) 
   {


       $this->trigger('beforeSend');
       $result = Sms::make()
           ->to($to)
           ->content($content)
           ->send($queue);

       $this->trigger('afterSend');
       return $result;
   }


   /**
    * 简洁语音发送接口
    * @param $to 接收人
    * @param $content 短信内容
    * @param $是否入队列, 未实现
    * @return array 
    *    [
    *    'success' => false,
    *    'info'  => '',
    *    'code'  => 0
    *    ];
    *
    */
   public function voice($to, $content, $queue=true) {

       $this->trigger('beforeVoice');
       $result = Sms::voice($content)
           ->to($to)
           ->send($queue);
       //  foreach($results as $r) {
       //     if ($r['success'] === true) {
       //         $success = true;
       //     }
       //  }
       // if (!$success) {
       //     Yii::error($results);
       // }
       $this->trigger('afterVoice');
       return $result;

   }


}
