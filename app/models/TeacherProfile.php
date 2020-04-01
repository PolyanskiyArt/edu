<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_profile".
 *
 * @property int $id
 * @property string $photo_path Путь к фото
 * @property string $description Описание опыта
 * @property int $user_id Ссылка на пользователя
 *
 * @property User $user
 */
class TeacherProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_path', 'description', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['photo_path'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_path' => 'Photo Path',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
