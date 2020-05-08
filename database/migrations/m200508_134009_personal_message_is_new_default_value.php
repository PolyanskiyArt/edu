<?php

use yii\db\Migration;

/**
 * Class m200508_134009_personal_message_is_new_default_value
 */
class m200508_134009_personal_message_is_new_default_value extends Migration
{

	public $tableName = 'personal_message';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->alterColumn($this->tableName, 'is_new', $this->integer()->defaultValue(1));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "m200508_134009_personal_message_is_new_default_value cannot be reverted.\n";
		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200508_134009_personal_message_is_new_default_value cannot be reverted.\n";

		return false;
	}
	*/
}
