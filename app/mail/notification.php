<?php
/**
 * Created by PhpStorm.
 * User: Kat
 * Date: 08.03.2019
 * Time: 21.00
 * @var \app\models\Activity $model
 */
?>

<h2>Событие стартует сегодя</h2>
<strong><?=$model->title?></strong>
<p style="color: green;">Дата старта:<?=Yii::$app->formatter->asDatetime($model->timeStart);?></p>



