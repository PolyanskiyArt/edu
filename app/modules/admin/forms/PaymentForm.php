<?php

namespace app\modules\admin\forms;

use app\models\Payment;
use Yii;

class PaymentForm extends Payment
{
	/**
	 * @var string
	 */
	public $password;
	
	/**
	 * @var string
	 */
	public $passwordRepeat;
	
	/**
	 * @var string
	 */
	public $roles;
	
	/**
	 * @inheritdoc
	 * @return array
	 */
	public function rules()
	{
		return [
			[['id', 'student_id', 'course_group_id', 'sum'], 'integer'],
			[['payed_at', 'approved_by', 'approved_at'], 'safe'],
		];
	}
	
	/**
	 * @inheritdoc
	 * @return bool
	 */
	public function beforeSave($insert)
	{

		return parent::beforeSave($insert);
	}

	/**
	 * @inheritDoc
	 */
	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

	}

	/**
	 * @inheritdoc
	 */
	public function afterFind()
	{
		parent::afterFind();
	}
	
	/**
	 * @param array|string $roles
	 */
	protected function updateUserRoles($roles)
	{

		Yii::$app->authManager->revokeAll($this->id);
		
	}
}