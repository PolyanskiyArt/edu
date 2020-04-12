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
 * @property string $filename
 *
 * @property User $approvedBy
 * @property User $student
 */
class Payment extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $file;

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
            ['file', 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
                'tooBig' => 'Limit is 500KB'
            ],
            [['student_id', 'course_group_id'], 'required'],
            [['student_id', 'sum', 'course_group_id', 'approved_by'], 'integer'],
            [['payed_at', 'approved_at'], 'safe'],
            [['filename'], 'string', 'max' => 250],
            [['approved_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['approved_by' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['student_id' => 'id']],
//            [['course_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseGroup::className(), 'targetAttribute' => ['id' => 'course_group_id']],
        ];
    }

    /**
     * Загружает файл с именем $courseGroupId_$userId.расширение в каталог uploads/
     * @param $courseGroupId - ID курса
     * @param $userId        - ID студента
     * @return bool          - true, если загружен успешно
     */
    public function upload(string $filename)
    {
        if ($this->validate()) {
            $dir =  Yii::getAlias('@uploads'); // Директория - должна быть создана
            $file = $dir . '/' . $filename;
            $this->file->saveAs($file); // Сохраняем файл
            return true;
        } else {
            return false;
        }
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
            'filename' => 'Скан чека',
            'file' => 'Квитанция',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseGroup()
    {
        return $this->hasMany(CourseGroup::className(), ['id' => 'course_group_id']);
    }
}
