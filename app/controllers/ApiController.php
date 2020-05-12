<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 11.05.2020
 * Time: 22:08
 */

namespace app\controllers;

use yii\helpers\Json;
use yii\web\Controller;
use app\api;

class ApiController extends Controller
{
    public function actionGet()
    {
//        разобратьь get
//        создать нужный объект
//        вызвать нужный метод
//        вернуть JSON return или echo
            $json = new Json();
        $ar = api\Messages::getLastMessages();

        return $json->encode($ar);
    }

    public function actionPut()
    {

    }

    public function actionPost()
    {

    }

    public function actionPatch()
    {

    }

}