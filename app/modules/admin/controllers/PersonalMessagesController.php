<?php

namespace app\modules\admin\controllers;

use app\models\PersonalMessage;
use app\models\PersonalMessageSearch;
use app\repository\PersonalMessageRepository;
use yii;

class PersonalMessagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new PersonalMessageSearch();
        $model = new PersonalMessage();

        $queryParams = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($queryParams);

        $dataProvider->setSort([
            'attributes' => [
                'fromUser' => [
                    'label' => 'вид кого',
                ],
                'from_user',
                'to_user',
                'text',
                'is_new',
                'important_state',
                'created_at' => [
                    'default' => SORT_ASC,
                ],
                'created_at',
            ],
        ]);

        return $this->render('index', compact('searchModel', 'dataProvider', 'model'));
    }

    public function actionList()
    {
        $searchModel = new PersonalMessageSearch();
        $model = new PersonalMessage();

        $queryParams = Yii::$app->request->queryParams;

        // вся переписка с этим Пользователем Прочитана
        $id = $queryParams['id'];
        PersonalMessage::updateAll(['is_new' => 0], ['OR', ['from_user_id' => $id], ['to_user_id' => $id]]);

        $dataProvider = $searchModel->search1($queryParams);

        $dataProvider->setSort([
            'attributes' => [
                'fromUser' => [
                    'label' => 'вид кого',
                ],
                'from_user',
                'to_user',
                'text',
                'is_new',
                'important_state',
                'created_at' => [
                    'default' => SORT_ASC,
                ],
                'created_at',
            ],
        ]);

        return $this->render('list', compact('searchModel', 'dataProvider', 'model'));
    }

    public function actionCreate()
    {
        $model = new PersonalMessage();
        $id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model['from_user_id'] = $id;
            $result = $model->save(true);
        }

        // перейти на предыдущую страницу (index or list)
        $this->redirect(Yii::$app->request->referrer);
    }
}
