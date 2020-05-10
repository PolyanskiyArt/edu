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
                    'label'=> 'вид кого',
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

        return $this->render('index', compact('searchModel', 'dataProvider','model'));
    }

    public function actionCreate()
    {
        $model = new PersonalMessage();
        $id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $model['from_user_id'] = $id;
            $model['created_at'] = date('Y-m-d h:i:s');
            $result = $model->save();
//            dump($model);
//            dump($result);
//            die;

            return $this->redirect(['index']);
        }

        return $this->redirect(['index']);
    }
}
