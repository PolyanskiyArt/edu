<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\valueObject\RoleValueObject;

NavBar::begin([
	'brandLabel' => 'ИТ Курсы',
	'brandUrl'   => Yii::$app->homeUrl,
	'options'    => [
		'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
	],
]);
echo Nav::widget([
	'options' => ['class' => 'navbar-nav ml-auto'],
	'items'   => [
		['label' => 'Главная', 'url' => ['/site/index']],
		['label' => 'Курсы', 'url' => ['/course']],
        ['label' => 'Набор группы', 'url' => ['/course-group']],
		['label' => 'Обратная связь', 'url' => ['/site/contact']],

		['label' => Yii::t('app', 'Admin Panel'), 'url' => ['/admin'], 'visible' => user()->can(RoleValueObject::PERMISSION_ADMINISTER)],
		Yii::$app->user->isGuest ? (
		['label' => Yii::t('app', 'Login'), 'url' => ['/auth/login']]
		) : (
			'<li>'
			. Html::beginForm(['/auth/logout'], 'post')
			. Html::submitButton(
				Yii::t('app', 'Logout') . '(' . Yii::$app->user->identity->username . ')',
				['class' => 'btn btn-link logout']
			)
			. Html::endForm()
			. '</li>'
		)
	],
]);
NavBar::end();


