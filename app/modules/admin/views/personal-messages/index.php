<?php

use app\modules\admin\widgets\LinkedColumn;
use yii\helpers\Html;
use app\modules\admin\widgets\BoxGridView;
use app\modules\admin\Module as AdminModule;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-title'); ?>
<?php $this->endBlock(); ?>


<div class="payment-index">

    <?= $this->render('_search', ['model' => $searchModel]) ?>
    <?= BoxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'layout'=>"{pager}\n{summary}\n{items}",
        'rowOptions' => function ($model, $key, $index, $grid)
        {
            if($model['is_new'] == 1) {
//                return ['style' => 'background-color:#778899; color: maroon;'];
                return ['style' => 'font-weight: 600;'];
            }
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'fromUser',
                'label' => 'User',

            ],
            [
                'attribute' => 'text',
                'value' => function ($model) {
                    return StringHelper::truncate($model['text'], 40);
                }
            ],
//            'is_new',
            'important_state',
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
