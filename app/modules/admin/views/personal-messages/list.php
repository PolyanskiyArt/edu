<?php

use app\modules\admin\widgets\BoxGridView;
use app\models\User;

$queryParams = Yii::$app->request->queryParams;
$user_id = $queryParams['id'];
$this->title = 'Переписка с ' . User::findIdentity($user_id)->username;

$this->params['breadcrumbs'][] = [
    'label' => 'Сообщения ',
    'url' => 'http://ed.loc/public/admin/personal-messages',
    'title' => 'Смотреть всю переписку',
];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $this->beginBlock('content-title'); ?>
<?php $this->endBlock(); ?>

<div class="message-list">

    <?= $this->render('_create1', ['model' => $model]) ?>

    <?= BoxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            if ($model['is_new'] == 1) {
//                return ['style' => 'background-color:#778899; color: maroon;'];
                $ret ['style'] = 'font-weight: 600;';
            }
            if (Yii::$app->user->id == $model['to_user_id']) {
                $ret ['style'] = 'background-color:#ddeeff; color: maroon;';
//                $ret ['style'] = 'background-color:#778899; color: maroon;';
            } else {
                $ret ['style'] = 'background-color:#ffeedd;';
            }
            return $ret;
        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '80'],
            ],
            'text:ntext',
//            'is_new',
            'important_state',
            'created_at',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>



