<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 11.05.2020
 * Time: 22:08
 */

namespace app\controllers;

use yii\base\Module;
use yii\helpers\Json;
use yii\web\Controller;
use app\api;

class ApiController extends \yii\rest\Controller
{
    /* @var api\Messages $messages */
    private $messages;

    public function __construct($id, Module $module, array $config)
    {
        parent::__construct($id, $module, $config);
        $this->messages = new api\Messages();
    }

    public function actionGet()
    {
//        разобратьь get
//        создать нужный объект
//        вызвать нужный метод
//        вернуть JSON return или echo
        $json = new Json();
        $ar = $this->messages->getLastMessages();

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