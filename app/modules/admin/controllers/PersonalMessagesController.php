<?php

namespace app\modules\admin\controllers;
use app\models\PersonalMessageSearch;
use app\traits\controllers\FindModelOrFail;
use Yii;
use yii\filters\VerbFilter;
use app\repository\PersonalMessageRepository;


class PersonalMessagesController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $searchModel = new PersonalMessageSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = (new PersonalMessageRepository())->findListLastMessages();
        return $this->render('index', compact('dataProvider'));
    }

}
