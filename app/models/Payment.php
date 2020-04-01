<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $student_id Идентификатор пользователя (студента)
 * @property string $payed_at Время платежа
 * @property int $sum Сумма платежа
 * @property int $course_group_id Идентификатор группы в которую он вступает
 * @property string $approved_at Время подтверждения платежа
 * @property int $approved_by Пользователь подтвердивший платеж
 * @property string $scan_path
 *
 * @property User $approvedBy
 * @property User $student
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_group_id', 'scan_path'], 'required'],
            [['student_id', 'sum', 'course_group_id', 'approved_by'], 'integer'],
            [['payed_at', 'approved_at'], 'safe'],
            [['scan_path'], 'string', 'max' => 250],
            [['approved_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['approved_by' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'student_id' => 'Идентификатор студента',
            'payed_at' => 'Время оплаты',
            'sum' => 'Сумма',
            'course_group_id' => 'Идентификатор группы',
            'approved_at' => 'Время подтверждения',
            'approved_by' => 'Идентификатор апрувера',
            'scan_path' => 'Путь к скану чека',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'approved_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }
}
