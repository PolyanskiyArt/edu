<?php

use app\models\User;
use app\modules\admin\widgets\LinkedColumn;
use yii\helpers\Html;
use app\modules\admin\widgets\BoxGridView;
use app\modules\admin\Module as AdminModule;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Платежи';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-title'); ?>
<?php $this->endBlock(); ?>

<div class="payment-index">

    <?= BoxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            $url = Yii::$app->urlManager->createUrl('admin/payments/view?id=' . $model['id']);
            $ret ['onclick'] = "location.href='" . $url  . "'";
            return $ret;
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], // номер по порядку
            'student_id',
            'payed_at',
            'sum',
            'course_group_id',
            'approved_at',
            'approved_by',

        ],
    ]); ?>

</div>