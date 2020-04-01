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

    <?= $form->field($model, 'student_id')->textInput() ?>

    <? //$form->field($model, 'payed_at')->textInput() ?>
    <?= \kartik\datetime\DateTimePicker::widget([
        'name' => 'payed_at',
        'options' => ['placeholder' => 'Выбор времени оплаты ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'dd MM yyyy h:i',
            'startDate' => date('dd MM yyyy h:i'),
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'course_group_id')->textInput() ?>

    <?= $form->field($model, 'approved_by')->textInput() ?>

    <?= $form->field($model, 'scan_path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
