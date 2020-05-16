<?php

use yii\db\Migration;

/**
 * Class m200516_124615_inherit_role_for_student
 */
class m200516_124615_inherit_role_for_student extends Migration
{
	public $table = 'auth_item_child';

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->db->createCommand()->upsert($this->table, ['parent' => 'student', 'child' => 'Authenticated'])->execute();
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		return true;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200516_124615_inherit_role_for_student cannot be reverted.\n";

		return false;
	}
	*/
}
