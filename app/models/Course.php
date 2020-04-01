<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $lesson_count
 * @property int $difficult
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'lesson_count', 'difficult'], 'required'],
            [['description'], 'string'],
            [['price', 'lesson_count', 'difficult'], 'integer'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'price' => 'Стоимость',
            'lesson_count' => 'Количество уроков',
            'difficult' => 'Уровень сложности',
        ];
    }
}
