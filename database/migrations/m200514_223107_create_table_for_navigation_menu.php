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
            'subitems' => $this->string(), // 'permissions' === Yii::$app->controller->id,
        ],
            $tableOptions);

        Yii::$app->db->createCommand()->batchInsert($this->table, [
            'id',
            'parent_id',
            'label',
            'icon',
            'url',
            'subitems',
        ], [
            [
                'id' => 1,
                'parent_id' => 0,
                'label' => 'Доска заказов',
                'icon' => 'fas fa-tachometer-alt',
                'url' => '/admin/dashboard',
                'subitems' => "",
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'label' => 'Пользователи',
                'icon' => 'fas fa-users',
                'url' => '/admin/users',
                'subitems' => "",
            ],
            [
                'id' => 3,
                'parent_id' => 0,
                'label' => 'Платежи',
                'icon' => 'fas fa-ruble-sign',
                'url' => '/admin/payments',
                'subitems' => true,
            ],
            [
                'id' => 4,
                'parent_id' => 0,
                'label' => 'Сообщения',
                'icon' => 'far fa-comments',
                'url' => '/admin/personal-messages',
                'subitems' => true,
            ],
            [
                'id' => 5,
                'parent_id' => 0,
                'label' => 'Доступы',
                'icon' => 'fas fa-lock',
                'url' => '/admin/rbac/permissions',
                'subitems' => "",
            ],
            [
                'id' => 6,
                'parent_id' => 0,
                'label' => 'Настройки',
                'icon' => 'fas fa-cog',
                'url' => '#',
                'subitems' => true,
            ],
            [
                'id' => 7,
                'parent_id' => 6,
                'label' => 'Система',
                'icon' => '',
                'url' => '/admin/settings/app',
                'subitems' => true,
            ],
            [
                'id' => 8,
                'parent_id' => 0,
                'label' => 'Мои курсы',
                'icon' => 'fas fa-television',
                'url' => '#',
                'subitems' => true,
            ],
            [
                'id' => 9,
                'parent_id' => 8,
                'label' => 'Gii',
                'icon' => '',
                'url' => '/gii',
                'subitems' => true,
            ],
            [
                'id' => 10,
                'parent_id' => 8,
                'label' => 'Debug',
                'icon' => '',
                'url' => '/debug',
                'subitems' => true,
            ],
            [
                'id' => 11,
                'parent_id' => 0,
                'label' => 'Разработка',
                'icon' => 'fas fa-code',
                'url' => '#',
                'subitems' => true,
            ],
            [
                'id' => 12,
                'parent_id' => 11,
                'label' => 'Gii',
                'icon' => '',
                'url' => '/gii',
                'subitems' => true,
            ],
            [
                'id' => 13,
                'parent_id' => 11,
                'label' => 'Debug',
                'icon' => '',
                'url' => '/debug',
                'subitems' => true,
            ],
            [
                'id' => 14,
                'parent_id' => 0,
                'label' => 'Мои курсы',
                'icon' => '',
                'url' => 'course/index',
                'subitems' => 'getCourseMenu',
            ],
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
