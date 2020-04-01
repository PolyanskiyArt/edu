<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourseGroup */

$this->title = 'Create Course Group';
$this->params['breadcrumbs'][] = ['label' => 'Course Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
