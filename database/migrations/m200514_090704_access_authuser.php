<?php

use yii\db\Migration;

/**
 * Class m200514_090704_access_authuser
 */
class m200514_090704_access_authuser extends Migration
{

    public $table = 'auth_item_child';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $ar = array();
        $ar[] = 'admin/personal-messages/index';
        $ar[] = 'admin/personal-messages/list';
        $ar[] = 'admin/users/update';
        $ar[] = 'api/get';

        foreach ($ar as $v) {
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
