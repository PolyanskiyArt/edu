<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_progress".
 *
 * @property int $id
 * @property int $student_id Идентификатор пользователя (студента)
 * @property int $lesson_group_id Идентификатор пройденного урока
 *
 * @property LessonGroup $lessonGroup
 * @property User $student
 */
class StudentProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'lesson_group_id'], 'required'],
            [['student_id', 'lesson_group_id'], 'integer'],
            [['lesson_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => LessonGroup::className(), 'targetAttribute' => ['lesson_group_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'lesson_group_id' => 'Lesson Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonGroup()
    {
        return $this->hasOne(LessonGroup::className(), ['id' => 'lesson_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }
}
