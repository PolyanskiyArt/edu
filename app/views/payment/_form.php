<?php

use app\models\Payment;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value' => $student_id])->label(false); ?>

    <? //$form->field($model, 'payed_at')->textInput() ?>
    <?= \kartik\datetime\DateTimePicker::widget([
        'name' => 'Payment[payed_at]',
        'options' => ['placeholder' => 'Выбор времени оплаты ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd h:i',
            'startDate' => date('yyyy-MM-dd h:i'),
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'sum')->textInput(['value'=> $sum ]) ?>

    <?= $form->field($model, 'course_group_id')->hiddenInput(['value'=> $course_group_id])->label(false); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
