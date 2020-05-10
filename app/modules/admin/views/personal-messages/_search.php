<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="message-search">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'is_new')->checkbox(['onchange' => '$("button[type=\'submit\'").click();'])->label('Только новые'); ?>
    <?= Html::submitButton('Фильтр', ['class' => 'btn btn-primary', 'style' => 'display:none']) ?>

    <?php ActiveForm::end(); ?>

</div>
