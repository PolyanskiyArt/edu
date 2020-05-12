<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 11.05.2020
 * Time: 22:38
 */

namespace app\api;

use app\models\PersonalMessage;
use Yii;
use yii\helpers\StringHelper;

class Messages extends PersonalMessage
{
//.text-primary     - синий
//.text-secondary   - серый
//.text-muted       - серый
//.text-success     - зеленый
//.text-danger      - красный
//.text-warning     - желтый
//.text-info        - голубой

    const STAR_COLOR = [
        "text-muted",
        "text-primary",
        "text-warning",
        "text-danger",
    ];

    const DELAY_UPDATE = 5000;

    public static function getLastMessages() : array
    {

        $queryParams[':me_id'] = Yii::$app->user->id;

        $sql = 'SELECT u.username, u.id, p.text, p.created_at, p.important_state FROM (SELECT MAX(id) AS maxid, from_user_id AS user FROM personal_message' .
            ' WHERE from_user_id != :me_id AND is_new = 1 GROUP BY user ) AS a' .
            ' INNER JOIN personal_message p ON a.maxid = id' .
            ' LEFT JOIN user u ON a.user=u.id' .
            ' ORDER BY p.created_at DESC LIMIT 4';

        $list = Yii::$app->db->createCommand($sql, $queryParams)->queryAll();

        $list = array_map(function ($v) {
            return [
                'username' => $v['username'],
                'user_id' => $v['id'],
                'text' => StringHelper::truncate($v['text'], 25),
                'created_at' => $v['created_at'],
                'important_state' => $v['important_state'],
                'star_color' => self::STAR_COLOR[ (int) $v['important_state']] ?? 'text-success',
            ];
        }, $list);

//        $cnt = count($list);

        $cnt = (new \yii\db\Query())
            ->from('personal_message')
            ->where(['is_new' => 1])
            ->count();

        return compact('list', 'cnt');

    }

}