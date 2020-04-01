<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $course_id Идентификатор курса
 * @property string $name Название урока
 * @property string $description Текстовое описание урока
 * @property int $duration_minutes Продолжительность (в минутах)
 *
 * @property Course $course
 * @property LessonGroup[] $lessonGroups
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'name', 'description', 'duration_minutes'], 'required'],
            [['course_id', 'duration_minutes'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'name' => 'Name',
            'description' => 'Description',
            'duration_minutes' => 'Duration Minutes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonGroups()
    {
        return $this->hasMany(LessonGroup::className(), ['lesson_id' => 'id']);
    }
}
