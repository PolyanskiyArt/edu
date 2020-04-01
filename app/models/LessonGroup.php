<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson_group".
 *
 * @property int $id
 * @property int $group_id Идентификатор группы
 * @property int $lesson_id Идентификатор урока
 * @property string $time_start Время начала урока
 * @property int $teacher_id Идентификатор учителя
 *
 * @property User $teacher
 * @property CourseGroup $group
 * @property Lesson $lesson
 * @property StudentProgress[] $studentProgresses
 */
class LessonGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'lesson_id', 'time_start', 'teacher_id'], 'required'],
            [['group_id', 'lesson_id', 'teacher_id'], 'integer'],
            [['time_start'], 'safe'],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'lesson_id' => 'Lesson ID',
            'time_start' => 'Time Start',
            'teacher_id' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(CourseGroup::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgresses()
    {
        return $this->hasMany(StudentProgress::className(), ['lesson_group_id' => 'id']);
    }
}
