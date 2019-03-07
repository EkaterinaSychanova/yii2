<?php

use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use kartik\time\TimePicker;


?>

<div class="row">
    <div class="col-lg-6"></div>
    <h2>Добавить событие:</h2>
    <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
    <?= $form->field($activity, 'title'); ?>
    <?= $form->field($activity, 'description')->textarea(); ?>
    <p>Когда будет событие:
        <input type="date" name="calendar" value="2019-03-01"
               max="2050-06-01" min="2010-01-01">
    </p>
    <form>
        <p>В какое время запускать событие?</p>
        <p><input type="time" name="cron" value="12:00" min="00:01" max="06:00"></p>
    </form>


    <?= $form->field($activity, 'is_blocked')->checkbox(); ?>
    <?= $form->field($activity, 'is_repeated')->checkbox(); ?>
    <?= $form->field($activity, 'email'); ?>
    <?= $form->field($activity, 'email_repeat'); ?>
    <?= $form->field($activity, 'use_notification')->checkbox(); ?>
    <?= $form->field($activity, 'images[]')->fileInput(['multiple' => true]); ?>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Добавить</button>
    </div>
    <?php ActiveForm::end() ?>
</div>