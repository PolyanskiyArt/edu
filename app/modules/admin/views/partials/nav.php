<?php

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use app\modules\admin\widgets\Menu;
use app\repository\CourseRepository;

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl; ?>" class="brand-link">
        <span class="brand-image" style="opacity: .8; line-height: 1.8em">EDU</span>
        <span class="brand-text font-weight-light">Личный кабинет</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-tie img-circle elevation-2"></i>
            </div>
            <div class="info flex-grow-1">
                <?= Html::a(Html::encode(Yii::$app->user->identity->getShortName()), ['users/update?id=' . Yii::$app->user->id]) ?></a>
            </div>
            <div class="align-self-end">
                <?= Html::a(
                    '<i class="fa fa-power-off"></i>',
                    ['/auth/logout'],
                    [
                        'title' => 'Sign Out',
                        'data-method' => 'post',
                        'class' => 'd-block',
                        'style' => 'line-height: 2em;',
                    ]
                ); ?>
            </div>
        </div>
        <!-- Sidebar Menu -->
<?php
//        $a = Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin/rbac/users/update');
$items = \app\models\Nav::getMenu();

?>
        <nav class="mt-2">
            <?= Menu::widget([
                'options' => [
                    'class' => 'nav nav-pills nav-sidebar flex-column',
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false',
                ],
                'items' => $items,
            ]) ?>
        </nav>
    </div>

</aside>
