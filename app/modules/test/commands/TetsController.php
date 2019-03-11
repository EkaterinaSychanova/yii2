<?php

namespace app\modules\test\commands;


use yii\console\Controller;

class TetsController extends Controller
{
    public function actionIndex(){
        echo 'test'.PHP_EOL;
    }
}