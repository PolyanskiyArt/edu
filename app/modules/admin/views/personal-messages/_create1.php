<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$request = Yii::$app->request;
$id = $request->get('id');

?>

<div class="message-create">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['create'],
        'method' => 'post',
    ]); ?>


    <?= $form->field($model, 'text')->textarea(['rows' => 2, 'cols' => 5])->label('Текст сообщения'); ?>
    <?= $form->field($model, 'to_user_id')->hiddenInput(['value' => $id ])->label(false); ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
