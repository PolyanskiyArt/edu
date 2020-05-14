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

        $a = Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin/rbac/users/update');

        if (\Yii::$app->user->can('administer')) {
            $items = [
                [
                    'label' => 'Доска заказов',
                    'icon' => 'fas fa-tachometer-alt',
                    'url' => ['/admin/dashboard'],
                    'active' => 'dashboard' === Yii::$app->controller->id,
                ],
                [
                    'label' => 'Пользователи',
                    'icon' => 'fas fa-users',
                    'url' => ['/admin/users'],
                    'active' => 'users' === Yii::$app->controller->id,
                ],
                [
                    'label' => 'Платежи',
                    'icon' => 'fas fa-ruble-sign',
                    'url' => ['/admin/payments'],
                ],
                [
                    'label' => 'Сообщения',
                    'icon' => 'far fa-comments',
                    'url' => ['/admin/personal-messages'],
                ],
                [
                    'label' => 'Доступы',
                    'icon' => 'fas fa-lock',
                    'url' => ['/admin/rbac/permissions'],
                    'active' => 'permissions' === Yii::$app->controller->id,
                ],
                [
                    'label' => 'Настройки',
                    'icon' => 'fas fa-cog',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => 'Система',
                            'url' => ['/admin/settings/app'],
                        ],
                    ],
                ],
                [
                    'label' => 'Мои курсы',
                    'icon' => 'fas fa-television',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Gii', 'url' => ['/gii'], 'attributes' => 'target="_blank"'],
                        ['label' => 'Debug', 'url' => ['/debug'], 'attributes' => 'target="_blank"'],
                    ],
                ],
                [
                    'label' => 'Разработка',
                    'icon' => 'fas fa-code',
                    'url' => '#',
                    'items' => [
                        ['label' => 'Gii', 'url' => ['/gii'], 'attributes' => 'target="_blank"'],
                        ['label' => 'Debug', 'url' => ['/debug'], 'attributes' => 'target="_blank"'],
                    ],
                ],
            ];

        } else {
            // TODO это мракобесие следует перенести в контроллер, нужно найти где вызывается эта вьюшка и вынести туда инициализацию переменных
            $myCourses = (new CourseRepository())->getPayedByUserId(Yii::$app->user->id);
            $myCoursesItems = array_combine(array_column($myCourses, 'id'), array_column($myCourses, 'name'));
//            dump($myCoursesItems);

            $subItems = array();
            foreach ($myCoursesItems as $k => $v) {
                $subItems[] = ['label' => $v, 'icon' => 'fa fa-book','url' => ['url/?id=' . $k]];
            }

            $items = [
                [
                    'label' => 'Мои курсы',
                    'icon' => 'fas fa-television',
                    'url' => '#',
                    'items' => $subItems,
                ],

            ];

        }

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
