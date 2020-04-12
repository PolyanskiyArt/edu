<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = Yii::t('app', 'Create Payment');
//$this->params['breadcrumbs'][] = ['label' => 'Платежи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['course-group/index']];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model', 'sum', 'student_id', 'course_group_id')) ?>

</div>
