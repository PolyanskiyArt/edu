<?php

use app\modules\admin\widgets\LinkedColumn;
use yii\helpers\Html;
use app\modules\admin\widgets\BoxGridView;
use app\modules\admin\Module as AdminModule;

/* @var $this yii\web\View */
$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>personal-message/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?= BoxGridView::widget([
    'dataProvider' => $dataProvider,
    'layout'=>"{items}",
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'from_user_id',
        'to_user_id',
        'text:ntext',
        'is_new',
        'important_state',
        'created_at',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>