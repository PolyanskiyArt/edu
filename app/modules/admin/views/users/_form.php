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

<?php
$dir = Yii::getAlias('@avatars'); // Директория - должна быть создана
if (is_null($model['avatar'])) {
    $file = 'nophoto.jpg';
} else {
    $file = $model['avatar'];
    if (!file_exists($dir . '/' . $file)) {
        $file = 'nophoto.jpg';
    }

}
if (file_exists($dir . '/' . $file)) {
    echo Html::img('../../../avatars/' . $file, ['class' => 'img-circle', 'alt' => 'Аватар']);
}
?>


<div class="user-form card">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
    ]); ?>

    <div class="card-body">
        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

        <?= $form->field($model, 'file')->fileInput() ?>
        <?= $form->field($model, 'city')->textInput() ?>

        <?php
        if (\Yii::$app->user->can('teacher')) {
            echo $form->field($model, 'description')->textInput();
        }
        ?>

        <?php
        if (\Yii::$app->user->can('administer')) {
            echo $form->field($model, 'status')->dropDownList(User::getStatusesList());
            echo $form->field($model, 'roles')->dropDownList(User::getRolesList(), ['multiple' => 'multiple',]);
        }
        ?>
    </div>
    <div class="card-footer text-right">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
