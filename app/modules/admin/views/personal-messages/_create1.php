<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\User;
use yii\helpers\ArrayHelper;

?>

<div class="message-create">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['create'],
        'method' => 'post',
    ]); ?>


    <?= $form->field($model, 'text')->textarea(['rows' => 2, 'cols' => 5])->label('Текст сообщения'); ?>
<!--    --><?//= $form->field($model, 'to_user_id')->hiddenInput(['value' => $queryParams['id']])->label(false); ?>
    <?= $form->field($model, 'to_user_id')->hiddenInput(['value' => '10'])->label(false); ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
