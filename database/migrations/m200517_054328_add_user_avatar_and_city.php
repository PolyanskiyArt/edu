<?php

use yii\db\Migration;

/**
 * Class m200517_054328_add_user_avatar_and_city
 */
class m200517_054328_add_user_avatar_and_city extends Migration
{
    public $tableName = 'user';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'avatar', $this->string(250));
        $this->addColumn($this->tableName, 'city', $this->string(50));
        $this->dropColumn('teacher_profile', 'photo_path');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('teacher_profile', 'photo_path', $this->string(250));
        $this->dropColumn($this->tableName, 'avatar');
        $this->dropColumn($this->tableName, 'city');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200517_054328_add_user_avatar_and_city cannot be reverted.\n";

        return false;
    }
    */
}
