<?php

use app\models\User;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model \app\modules\admin\forms\UserForm
 * @var $form yii\widgets\ActiveForm
 */

$model['description'] = $model->teacherProfile->description ?? 'none';

?>

<div class="user-form card">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
    ]); ?>

    <div class="card-body">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="card-footer text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
