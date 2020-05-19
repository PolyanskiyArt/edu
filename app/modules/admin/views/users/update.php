<?php

use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\forms\UserForm */
/* @var $roles array */

$this->title = "Редактирование {$model->fullName}";
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['update', 'id' => $model->id]];
$this->params['heading'] = 'Редактирование';
$this->params['subheading'] = $model->fullName;
?>
<div class="user-update">


    <?= Tabs::widget(
        [
            'items' => [
                [
                    'label' => 'Информация',
                    'content' => $this->render('_form', ['model' => $model]),
                    'active' => true,
                ],
                [
                    'label' => 'Квалификация',
                    'content' => 'Вкладка 2'
                ],
            ]
        ]
    )
    ?>


<!--    --><?//= $this->render('_form', [
//		'model' => $model,
//	]) ?>

</div>
