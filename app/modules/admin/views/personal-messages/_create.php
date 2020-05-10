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
    <?php
    $id = Yii::$app->user->id;
    $users = User::find()->where('id != :id', [':id' => $id])->orderby(['username' => SORT_ASC])->all();
    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
    $items = ArrayHelper::map($users, 'id', 'username');
    $params = [
        'prompt' => 'Кому письмо'
    ];
    echo $form->field($model, 'to_user_id')->dropDownList($items, $params);
    ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
