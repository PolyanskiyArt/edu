<?php

namespace app\modules\admin\controllers;
use app\models\PersonalMessageSearch;
use app\repository\PersonalMessageRepository;


class PersonalMessagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new PersonalMessageSearch();
        $dataProvider = $searchModel->search((new PersonalMessageRepository())->findListLastMessages());

        return $this->render('index', compact('dataProvider'));
    }

}
