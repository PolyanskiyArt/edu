<?php $assets = \app\assets\AssetBundle::register($this);

use app\widgets\Course; ?>
<!-- Wide card with share menu button -->
<style>
    .content-grid {
        max-width: 1024px;
    }
    .demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 176px;
        background: url("<?= $assets->baseUrl; ?>/images/courses/php.jpg") center / cover;
    }
    .demo-card-wide > .mdl-card__menu {
        color: #fff;
    }
</style>
<div class="content-grid mdl-grid">

    <?foreach ($courseGroups as $courseGroup) { ?>
        <div class="mdl-cell demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <span><kbd class="mdl-card__title-text mdl-color-text--black"><?= $courseGroup->course->name ?></kbd></span>
            </div>
            <div class="mdl-card__supporting-text">
                <?= $courseGroup->course->description ?>
                <br>Количество занятий: <?= $courseGroup->course->lesson_count ?>
                <br>Начало: <?=  Yii::$app->formatter->asDate($courseGroup->date_start, 'php:d F Y') ?>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="<?=Yii::$app->urlManager->createUrl(['course-group/view', 'id' => $courseGroup->id])?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Подробнее
                </a>
                <a href="<?=Yii::$app->urlManager->createUrl([Yii::$app->user ? 'payment/create' : 'auth/login', 'id' => $courseGroup->id])?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Купить
                </a>

            </div>
            <kbd>Стоимость <?= $courseGroup->course->price ?> руб.</kbd>
            <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons">share</i>
                </button>
            </div>
        </div>
    <?} ?>
</div>
