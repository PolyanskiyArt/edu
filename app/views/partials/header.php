<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\valueObject\RoleValueObject;

NavBar::begin([
    'brandLabel' => 'ИТ Курсы',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
    ],
]);

$item = [
    ['label' => 'Главная', 'url' => ['/site/index']],
    ['label' => 'Курсы', 'url' => ['/course']],
    ['label' => 'Набор группы', 'url' => ['/course-group']],
    ['label' => 'Обратная связь', 'url' => ['/site/contact']],
    ['label' => Yii::t('app', 'Admin Panel'), 'url' => ['/admin'], 'visible' => user()->can(RoleValueObject::PERMISSION_ADMINISTER)],
];

if (!Yii::$app->user->isGuest && !user()->can(RoleValueObject::PERMISSION_ADMINISTER)) {
    $item[] = ['label' => Yii::t('app', 'Личный кабинет'), 'url' => ['/admin/users/update?id=' . Yii::$app->user->identity->getId()],
        'visible' => true];
}

$item[] = Yii::$app->user->isGuest ? (
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
);


echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $item,
]);
NavBar::end();


