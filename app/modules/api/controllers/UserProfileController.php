<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 20.05.2020
 * Time: 19:59
 */

namespace app\modules\api\controllers;

use app\models\User;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

class UserProfileController extends Controller
{

    public function  actionIndex()
    {
        $this->enableCsrfValidation = false;
        return "Это индекс";
    }

    /**
     * Updates an existing User avatar.
     * If update is successful, return new name avatar, other false.
     *
     * @param
     *
     * @return mixed
     */
    public function actionSetAvatar()
    {

//        $this->enableCsrfValidation = false;

        $id = Yii::$app->user->id;

        $model = User::findOne(['id' => $id]);

        $request = Yii::$app->request;

        $post = Yii::$app->request->post();

                if ($post) {
                    $model->load($post); // загрузим поля формы
                    $model->file = $post['file']; // загрузим файл
                    if ($model->file) {
                        $model->avatar = \app\helpers\FileHelper::genAvatarName($model->id, 'png');
                    }
                    $model->save(false, ['avatar']);

                    if ($model->file && $model->upload($model->avatar)) {
                        return "Вернул " . $model['avatar'];
                    }
                } else {
                    return "НЕТ поста";
                }

                return "Вернул false";

    }
}