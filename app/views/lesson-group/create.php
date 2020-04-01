<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LessonGroup */

$this->title = 'Create Lesson Group';
$this->params['breadcrumbs'][] = ['label' => 'Lesson Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
