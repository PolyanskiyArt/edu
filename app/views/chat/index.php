<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $canCreate bool */

$this->title = 'Чат';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= \app\widgets\Chat::widget([
        'messages' => $dataProvider->models,
        'filterModel' => $searchModel,
    ]) ?>
</div>
