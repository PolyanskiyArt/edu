<?php

namespace app\repository;

/**
 * CourseGroupRepository represents the model behind the search form of `app\models\Course`.
 */
class CourseRepository
{
    /**
     * @param int $userId идентификатор студента
     * @return array массив параметров курсов
     * @throws
     */
    public function getPayedByUserId(int $userId): array
    {
        return \Yii::$app->db->createCommand(
            'SELECT * FROM course where id in
                    (SELECT course_id from course_group where id in 
                    (select course_group_id from payment where approved_by is not null and student_id = :id))'
        )->bindParam(':id', $userId)->queryAll();
    }
}
