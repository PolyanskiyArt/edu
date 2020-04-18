<?php

use yii\db\Migration;

/**
 * Class m200413_014255_alter_table_message_create_at_to_datetime
 */
class m200413_014255_alter_table_message_create_at_to_datetime extends Migration
{

	public $tableName = 'personal_message';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->alterColumn($this->tableName, 'created_at', $this->dateTime()->notNull()->defaultValue('0000-00-00 00:00:00'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "m200413_014255_alter_table_message_create_at_to_datetime cannot be reverted.\n";

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200413_014255_alter_table_message_create_at_to_datetime cannot be reverted.\n";

		return false;
	}
	*/
}
