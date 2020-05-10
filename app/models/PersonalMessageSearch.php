<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use Yii;

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
    public function search1($params)
    {
        $me_id = Yii::$app->user->id;

        $queryParams[':id_user'] = $params['id'];

        $sql = 'SELECT p.* FROM personal_message p WHERE p.from_user_id=:id_user OR p.to_user_id=:id_user ORDER BY created_at DESC';

        $queryCount = 'SELECT count(p.id) FROM personal_message p WHERE p.from_user_id=:id_user OR p.to_user_id=:id_user';

        $count = (int)Yii::$app->db->createCommand($queryCount, $queryParams)->queryScalar();

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
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            $dataProvider->params = $queryParams;
            return $dataProvider;
        }

        // grid filtering conditions
        if ($this->text !== '') {
            $dataProvider->sql = 'SELECT p.* FROM personal_message p WHERE (p.from_user_id=:id_user OR p.to_user_id=:id_user) AND text like :text ORDER BY created_at DESC';
            $queryParams[':text'] = '%' . $this->text . '%';
            $queryCount = 'SELECT count(p.id) FROM personal_message p WHERE (p.from_user_id=:id_user OR p.to_user_id=:id_user) AND text like :text';
        }

        $count = (int)Yii::$app->db->createCommand($queryCount, $queryParams)->queryScalar();

        $dataProvider->totalCount = $count;
        $dataProvider->params = $queryParams;

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
        $me_id = Yii::$app->user->id;

        $queryParams[':me_id'] = $me_id;

        $sql = 'SELECT u.username as fromUser,  a.user, p.* FROM (' .
            'SELECT MAX(id) AS maxid, IF (from_user_id = :me_id, to_user_id, from_user_id) AS user ' .
            'FROM personal_message ' .
            'WHERE from_user_id = :me_id or to_user_id = :me_id ' .
            'GROUP BY user' .
            ') AS a ' .
            'INNER JOIN personal_message p ON a.maxid = id ' .
            'LEFT JOIN user u ON a.user=u.id ' .
            'WHERE 1=1';

        $queryCount = 'SELECT count(p.id) FROM (' .
            'SELECT MAX(id) AS maxid, IF (from_user_id = :me_id, to_user_id, from_user_id) AS user ' .
            'FROM personal_message ' .
            'WHERE from_user_id = :me_id or to_user_id = :me_id ' .
            'GROUP BY user' .
            ') AS a ' .
            'INNER JOIN personal_message p ON a.maxid = id ' .
            'LEFT JOIN user u ON a.user=u.id ' .
            'WHERE 1=1';

        $count = (int)Yii::$app->db->createCommand($queryCount, $queryParams)->queryScalar();

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
            $dataProvider->params = $queryParams;
            return $dataProvider;
        }

        // grid filtering conditions
        if ($this->fromUser !== '') {
            $dataProvider->sql .= ' AND u.username like :fromUser';
            $queryParams[':fromUser'] = '%' . $this->fromUser . '%';
            $queryCount .= ' AND u.username like :fromUser';
        }

        if ($this->is_new) {
            $dataProvider->sql .= ' AND is_new=:is_new';
            $queryParams[':is_new'] = $this->is_new;
            $queryCount .= ' AND is_new=:is_new';
        }

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
