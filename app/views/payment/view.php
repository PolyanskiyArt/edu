<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */

$this->title = 'Платеж № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['course-group/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['course-group/index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'student_id',
            'payed_at',
            'sum',
            'course_group_id',
            'approved_at',
            'approved_by',
//            'filename',
            [
                'attribute' => 'filename',
                'format' => 'raw',
                'value' => function($data){
                    return '<img src="../../../uploads/' . $data->filename . '" alt="">';
                }
            ],
        ],
    ]) ?>

</div>
