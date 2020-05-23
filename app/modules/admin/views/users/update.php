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


    <?php
    $items[] = [
        'label' => 'Информация',
        'content' => $this->render('_form', ['model' => $model]),
        'active' => true,
    ];

    if (\Yii::$app->user->can('teacher')) {
        $items[] = [
            'label' => 'Квалификация',
            'content' => $this->render('_formTeacher', ['model' => $model]),
//            'url' => Yii::$app->urlManager->createUrl('admin/users/teacher-update?id=' . $model->id),
        ];
//        echo $form->field($model, 'description')->textInput();
    }
    ?>


    <?= Tabs::widget(
        [
            'items' => $items,
        ]
    )
    ?>


    <!--    --><? //= $this->render('_form', [
    //		'model' => $model,
    //	]) ?>

</div>
