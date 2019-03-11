<?php
/**
 * Created by PhpStorm.
 * User: Kat
 * Date: 08.03.2019
 * Time: 20:34
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{

    public $mailer;

    public function sendTodayNotification($activities){
        foreach ($activities as $activity){
            $result=$this->mailer->compose('notification',['model'=>$activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo(['meika1990@ya.ru',$activity->user->email])
                ->setSubject('Событие сегодня')
                ->setCharset('utf-8')
                ->attach(\Yii::getAlias('@app/web/images/97.jpg'))
                ->send();

            yield ['result'=>$result,'email'=>$activity->user->email];
        }
    }
}