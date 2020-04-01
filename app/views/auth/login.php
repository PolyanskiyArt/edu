<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\forms\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Вход в личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-md-6 mx-auto">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Заполните для входа:</p>

	<?php $form = ActiveForm::begin([
		'id'          => 'login-form',
	]); ?>
	
	<?= $form->field($model, 'username')->label('Имя пользователя')->textInput(['autofocus' => true]) ?>

	<?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

	<?= $form->field($model, 'rememberMe')->checkbox() ?>

	<div class="form-group">
		<?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>
	
	<div class="pt-3">
		<p>Еще не заренистрированы? <?= Html::a('Регистрация', ['auth/register']) ?></p>
		<p>Забыли свой пароль? <?= Html::a('Восстановление', ['auth/password-request']) ?></p>
	</div>

</div>
