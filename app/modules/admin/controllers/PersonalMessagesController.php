<?php

namespace app\modules\admin\controllers;

use app\models\PersonalMessageSearch;
use app\repository\PersonalMessageRepository;
use yii;

class PersonalMessagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new PersonalMessageSearch();
        // 1 вариант
        //$dataProvider = $searchModel->search1((new PersonalMessageRepository())->findListLastMessages());

        // 2 вариант
//        $a = (new PersonalMessageRepository())->findListLastMessages()->all();
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

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

}
