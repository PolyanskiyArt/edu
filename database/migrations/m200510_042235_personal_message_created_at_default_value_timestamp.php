<?php

use yii\db\Migration;

/**
 * Class m200510_042235_personal_message_created_at_default_value_timestamp
 */
class m200510_042235_personal_message_created_at_default_value_timestamp extends Migration
{

	public $tableName = 'personal_message';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->alterColumn($this->tableName, 'created_at',
			$this->dateTime()->defaultExpression('NOW()')->append('ON UPDATE NOW()'));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "m200510_042235_personal_message_created_at_default_value_timestamp cannot be reverted.\n";

		return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200510_042235_personal_message_created_at_default_value_timestamp cannot be reverted.\n";

		return false;
	}
	*/
}
