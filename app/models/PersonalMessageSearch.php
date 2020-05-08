<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonalMessage;
use yii\data\SqlDataProvider;
use Yii;
use yii\db\Query;

/**
 * PaymentSearch represents the model behind the search form of `app\models\Payment`.
 */
class PersonalMessageSearch extends PersonalMessage
{
// вычисляемые атрибуты
    public $fromUser;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'from_user_id', 'to_user_id', 'is_new', 'important_state'], 'integer'],
            [['created_at',], 'datetime'],
            [['text'], 'safe'],
            [['fromUser'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param ActiveQuery $query
     *
     * @return ActiveDataProvider
     */
    public function search1($query)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_ASC]],
        ]);

        $this->load($query->all());

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_user_id' => $this->from_user_id,
            'to_user_id' => $this->to_user_id,
            'is_new' => $this->is_new,
            'important_state' => $this->important_state,
            'text' => $this->text,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
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
//        $sql = 'SELECT p.* FROM personal_message p WHERE p.created_at = ' .
//            '(SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id)';

        $sql = 'SELECT p.*, u.username as fromUser, u1.username as to_user FROM personal_message p ' .
            'LEFT JOIN user u ON p.from_user_id=u.id ' .
            'LEFT JOIN user u1 ON p.to_user_id=u1.id ' .
            'WHERE p.created_at = (SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id)';

//        $query = Yii::$app->db->createCommand($sql)->query();
        $query = (new Query())->select('*')
            ->from('personal_message');


        $queryCount = 'SELECT count(id) FROM personal_message WHERE id in (SELECT p.id FROM personal_message p ' .
            'JOIN user u ON p.from_user_id=u.id ' .
            'JOIN user u1 ON p.to_user_id=u1.id ' .
            'WHERE p.created_at = (SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id))';

//            'SELECT count(p.id) FROM personal_message p WHERE p.created_at = ' .
//            '(SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id)';

        $count = Yii::$app->db->createCommand($queryCount)->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => (int)$count, //$queryCount,
            'sort' => [
                'attributes' => [
                    'from_user',
                    'to_user',
                    'is_new',
                    'important_state',
                    'text',
                    'created_at',
                ],
            ],
            'pagination' => [
//                'forcePageParam' => true,
//                'pageSizeParam' => true,
//                'pageParam' => 'active',
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

//        dump($this);
//        die();
        // grid filtering conditions
        if ($this->fromUser !== '') {
            $dataProvider->sql .= ' AND u.username like :fromUser';
            $queryParams[':fromUser'] = '%' . $this->fromUser . '%';
//            $queryCount .= ' AND fromUser like :fromUser';
            $queryCount = 'SELECT count(id) FROM personal_message WHERE id in (SELECT p.id FROM personal_message p ' .
                'JOIN user u ON p.from_user_id=u.id ' .
                'JOIN user u1 ON p.to_user_id=u1.id ' .
                'WHERE p.created_at = (SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id) AND u.username like :fromUser);';
        }
//
//        if ($this->toUser !== '') {
//            $dataProvider->sql .= ' AND toUser like :toUser';
//            $queryParams[':toUser'] = $this->toUser;
//            $queryCount .= ' AND toUser like :toUser';
//        }
//
        if ($this->text !== '') {
            $dataProvider->sql .= ' AND text like :text';
            $queryParams[':text'] = '%' . $this->text . '%';
            $queryCount .= ' AND text like :text';
        }

        $count = (int)Yii::$app->db->createCommand($queryCount, $queryParams)->queryScalar();

        $dataProvider->totalCount = $count;
        $dataProvider->params = $queryParams;

        return $dataProvider;
    }
}
