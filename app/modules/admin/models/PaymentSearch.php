<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Payment;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class PaymentSearch extends Payment
{
	public $full_name;

	/**
	 * @inheritdoc
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
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = Payment::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
				'attributes' => [
					'id',
					'student_id',
					'payed_at',
					'sum',
					'course_group_id',
					'approved_at',
					'approved_by',
					'filename',
				],
			],
		]);

		$this->load($params);

		if ( ! $this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id'         => $this->id,
			'student_id'     => $this->student_id,
			'approved_at' => $this->approved_at,
		]);

		return $dataProvider;
	}
}
