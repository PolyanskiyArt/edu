<?php

namespace app\repository;

use app\models\PersonalMessage;
use yii\db\ActiveQuery;

class PersonalMessageRepository
{
    /**
     * @return ActiveQuery
     * @throws
     */
    public function findListLastMessages(): ActiveQuery
    {
        return PersonalMessage::findBySql('SELECT p.* FROM personal_message p WHERE p.created_at = ' .
            '(SELECT MAX(m.created_at) FROM personal_message m WHERE m.from_user_id = p.from_user_id)');
    }
}
