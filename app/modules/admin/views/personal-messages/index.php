<?php

use app\modules\admin\widgets\LinkedColumn;
use yii\helpers\Html;
use app\modules\admin\widgets\BoxGridView;
use app\modules\admin\Module as AdminModule;
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-title'); ?>
<?php $this->endBlock(); ?>

<div class="payment-index">

    <?= BoxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'layout'=>"{pager}\n{summary}\n{items}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '80'],
            ],
            [
                'attribute' => 'fromUser',
                'label' => 'от кого',

            ],
//            [
//                'attribute' => 'from_user',
////                'label' => 'от кого',
//                'content' => function ($data) {
//                    return $data['from_user'] ?? '-- noname -- (' . $data['from_user_id'] . ')';
//                }
//            ],
            [
                'attribute' => 'to_user',
//                'label' => 'кому',
'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'username'),
//                'filter' => $this->to_user,

            ],
//            'from_user',
//            'to_user',
            'text:ntext',
            'is_new',
            'important_state',
//            [
//                'attribute' => 'created_at',
//                'format' => ['date', 'HH:mm:ss dd.MM.YYYY'],
//            ],
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
