<?php

namespace app\components;

use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $activity_class;

    public function getModel($params = null)
    {
        $model = new $this->activity_class;
        if ($params && is_array($params)) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model Activity
     */
    public function createActivity(&$model)
    {
        if ($model->validate()) {
            $model->images = UploadedFile::getInstances($model, 'images');
            $path = $this->getPathSaveFile();
            foreach ($model->images as $image) {
                $name = mt_rand(0, 9999) . time() . '.' . $image->getExtension();
                if (!$image->saveAs($path . $name)) {
                    $model->addError('images', 'Файл не удалось переместить');
                    return false;
                }
                $model->imagesNewNames[] = $name;
            }
            return true;
        }
    }

    private function getPathSaveFile()
    {
        FileHelper::createDirectory(\Yii::getAlias('@app/web/images/'));
        return \Yii::getAlias('@app/web/images/');
    }

    public function getActivityToday(){
        $activities=Activity::find()->andWhere('timeStart>=:date',[':date' => date('Y-m-d')])
            ->andWhere(['use_notification'=>1])->all();

        return $activities;
    }
}