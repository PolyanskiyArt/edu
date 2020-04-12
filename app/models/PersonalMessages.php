<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal_message".
 *
 * @property int $id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property string $text
 * @property bool $is_new
 * @property int $important_state
 * @property int $created_at
 */
class PersonalMessage extends \yii\db\ActiveRecord
{
    const IMPORTANT_STATE = [
        'none',
        'important',
        'very important'
    ];

    public static function tableName()
    {
        return 'personal_message';
    }

    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id', 'important_state'], 'required'],
            [['description'], 'string'],
            [['from_user_id', 'to_user_id', 'important_state'], 'integer'],
            [['text'], 'string', 'max' => 150],
            ['status', 'in', 'range' => array_keys(self::IMPORTANT_STATE)],
            [['from_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['from_user_id' => 'id']],
            [['to_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['to_user_id' => 'id']],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user_id' => 'От',
            'to_user_id' => 'К',
            'text' => 'Текст',
            'is_new' => 'Не прочитано',
            'important_state' => 'Важность',
            'created_at' => 'Время создания'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(User::className(), ['id' => 'from_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToUser()
    {
        return $this->hasOne(User::className(), ['id' => 'to_user_id']);
    }
}
