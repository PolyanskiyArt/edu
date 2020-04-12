<?php

use yii\db\Migration;

/**
 * Class m200412_001025_add_table_personal_message
 */
class m200412_001025_add_table_message extends Migration
{
    public $tableName = 'personal_message';

	public function safeUp()
	{
        $this->createTable($this->tableName, [
            'id'                => $this->primaryKey(),
            'from_user_id'      => $this->integer()->notNull(),
            'to_user_id'        => $this->integer()->notNull(),
            'text'              => $this->text()->notNull(),
            'is_new'            => $this->boolean()->notNull(),
            'important_state'   => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at'        => $this->integer()->notNull(),
        ]);
	}

	public function safeDown()
	{
        $this->dropTable($this->tableName);
	}
}
