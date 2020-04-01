<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\forms\UserForm */

$this->title                   = 'Создать пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['heading']       = 'Пользователи';
$this->params['subheading']    = 'Создать нового';
?>
<div class="user-create">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
