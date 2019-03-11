<?php
/**
 * Created by PhpStorm.
 * User: Kat
 * Date: 08.03.2019
 * Time: 19:57
 */

namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;
use yii\helpers\Console;

class NotificationController extends Controller
{

    public $param;

    public function optionAliases()
    {
        return ['p'=>'param'];
    }

    function options($actionID)
    {
        return ['param'];
    }

    public function actionParams(){
        echo 'param='.$this->param.PHP_EOL;
    }

    public function actionIndex(...$args){
        echo $this->ansiFormat('this is console'.PHP_EOL,Console::FG_BLUE);

        echo 'param '.print_r($args).PHP_EOL;
    }


    public function actionNotification(){
        $activities=\Yii::$app->activity->getActivityToday();

        $notif_comp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer'=>\Yii::$app->mailer]);

        foreach ($notif_comp->sendTodayNotification($activities) as $result){
            if($result['result']){
                echo $this->ansiFormat('Письмо отправлено:'.$result['email'],Console::FG_GREEN);
            }else{
                echo $this->ansiFormat('Письмо не отправлено:'.$result['email']);
            }
        }
    }
}