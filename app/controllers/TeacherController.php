<?php
/**
 * Created by PhpStorm.
 * User: Kat
 * Date: 17.02.2019
 * Time: 0:40
 */

namespace app\controllers;


use yii\web\Controller;

class TeacherController extends Controller
{
    public function actionStudent() {

        $framework="Yii2";
        return $this->render( "student", ["fram"=>$framework]);
    }
}