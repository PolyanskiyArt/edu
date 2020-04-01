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
<?foreach ($courses as $course) { ?>
<div class="mdl-cell demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title">
        <span><kbd class="mdl-card__title-text mdl-color-text--black"><?= $course->name ?></kbd></span>
    </div>
    <div class="mdl-card__supporting-text">
        <?= $course->description ?>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Подробнее
        </a>
    </div>
    <div class="mdl-card__menu">
        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">купить</i>
        </button>
    </div>
</div>
<?} ?>
</div>
