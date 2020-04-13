<?php

namespace app\repository;

use app\models\PersonalMessage;

/**
 * CourseGroupRepository represents the model behind the search form of `app\models\Course`.
 */
class PersonalMessageRepository
{
    /**
     * @param int $userId идентификатор студента
     * @return array массив параметров курсов
     * @throws
     */
    public function findListLastMessages(): array
    {
//        return \Yii::$app->db->createCommand(
//            'SELECT * FROM course where id in
//                    (SELECT course_id from course_group where id in
//                    (select course_group_id from payment where approved_by is not null and student_id = :id))'
//        )->bindParam(':id', $userId)->queryAll();
//
        $createdAt = '(SELECT MAX(created_at) FROM personal_message WHERE p.from_user_id=from_user_id AND p.to_user_id=to_user_id)';

        return PersonalMessage::findAll(['created_at' => $createdAt]);

    }
}
