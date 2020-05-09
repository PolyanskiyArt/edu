<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'is_new')->checkbox(['onchange'=> '$("button[type=\'submit\'").click();'])->label(''); ?>
    <?= Html::submitButton('Фильтр', ['class' => 'btn btn-primary', 'style'=>'display:none']) ?>

    <?php ActiveForm::end(); ?>

</div>
