<?php

use yii\db\Migration;

/**
 * Class m200514_223107_create_table_for_navigation_menu
 */
class m200514_223107_create_table_for_navigation_menu extends Migration
{
    public $table = 'nav';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'label' => $this->string()->notNull(),
            'icon' => $this->string(),
            'url' => $this->string()->defaultValue('#'),
            'active' => $this->string(), // 'permissions' === Yii::$app->controller->id,
        ],
            $tableOptions);

        Yii::$app->db->createCommand()->batchInsert($this->table, [
            'id',
            'parent_id',
            'label',
            'icon',
            'url',
            'active',
        ], [
            [
                'id' => 1,
                'parent_id' => 0,
                'label' => 'Доска заказов',
                'icon' => 'fas fa-tachometer-alt',
                'url' => '/admin/dashboard',
                'active' => "'dashboard' === Yii::$app->controller->id",
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'label' => 'Пользователи',
                'icon' => 'fas fa-users',
                'url' => '/admin/users',
                'active' => "'users' === Yii::$app->controller->id",
            ],
            [
                'id' => 3,
                'parent_id' => 0,
                'label' => 'Платежи',
                'icon' => 'fas fa-ruble-sign',
                'url' => '/admin/payments',
                'active' => true,
            ],
            [
                'id' => 4,
                'parent_id' => 0,
                'label' => 'Сообщения',
                'icon' => 'far fa-comments',
                'url' => '/admin/personal-messages',
                'active' => true,
            ],
            [
                'id' => 5,
                'parent_id' => 0,
                'label' => 'Доступы',
                'icon' => 'fas fa-lock',
                'url' => '/admin/rbac/permissions',
                'active' => "'permissions' === Yii::$app->controller->id",
            ],
            [
                'id' => 6,
                'parent_id' => 0,
                'label' => 'Настройки',
                'icon' => 'fas fa-cog',
                'url' => '#',
                'active' => true,
            ],
            [
                'id' => 7,
                'parent_id' => 6,
                'label' => 'Система',
                'icon' => '',
                'url' => '/admin/settings/app',
                'active' => true,
            ],
            [
                'id' => 8,
                'parent_id' => 0,
                'label' => 'Мои курсы',
                'icon' => 'fas fa-television',
                'url' => '#',
                'active' => true,
            ],
            [
                'id' => 9,
                'parent_id' => 8,
                'label' => 'Gii',
                'icon' => '',
                'url' => '/gii',
                'active' => true,
            ],
            [
                'id' => 10,
                'parent_id' => 8,
                'label' => 'Debug',
                'icon' => '',
                'url' => '/debug',
                'active' => true,
            ],
            [
                'id' => 11,
                'parent_id' => 0,
                'label' => 'Разработка',
                'icon' => 'fas fa-code',
                'url' => '#',
                'active' => true,
            ],
            [
                'id' => 12,
                'parent_id' => 11,
                'label' => 'Gii',
                'icon' => '',
                'url' => '/gii',
                'active' => true,
            ],
            [
                'id' => 13,
                'parent_id' => 11,
                'label' => 'Debug',
                'icon' => '',
                'url' => '/debug',
                'active' => true,
            ]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
*/
    public function down()
    {
        echo "m200514_223107_create_table_for_navigation_menu cannot be reverted.\n";

        $this->dropTable($this->table);
    }
}
