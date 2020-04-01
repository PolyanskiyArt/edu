<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LessonGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lesson Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lesson Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group_id',
            'lesson_id',
            'time_start',
            'teacher_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
