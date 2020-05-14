<?php

use yii\db\Migration;

/**
 * Class m200514_090704_access_authuser
 */
class m200514_090704_access_authuser extends Migration
{

    public $table = 'auth_item_child';
    const ITEMS =
        [
            'admin/personal-messages/index',
            'admin/personal-messages/list',
            'admin/users/update',
            'api/get',

        ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this::ITEMS as $v) {
            $this->db->createCommand()->upsert($this->table, ['parent' => 'Authenticated', 'child' => $v])->execute();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200514_090704_access_authuser cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200514_090704_access_authuser cannot be reverted.\n";

        return false;
    }
    */
}
