<?php

namespace app\models;

use app\repository\CourseRepository;
use Yii;

/**
 * This is the model class for table "nav".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $label
 * @property string $icon
 * @property string $url
 * @property string $subitems
 *
 */
class Nav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label'], 'required'],
            [['label', 'icon', 'url', 'subitems'], 'string'],
            [['label'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'parent_id',
            'label' => 'Текст меню',
            'icon' => 'Иконка',
            'url' => 'Ссылка',
            'subitems' => 'Условие видимости',
        ];
    }

    public static function getCourseMenu()
    {
        $myCourses = (new CourseRepository())->getPayedByUserId(Yii::$app->user->id);
        $myCoursesItems = array_combine(array_column($myCourses, 'id'), array_column($myCourses, 'name'));
        $subItems = array();
        foreach ($myCoursesItems as $k => $v) {
            $subItems[] = ['label' => $v, 'icon' => 'fa fa-book', 'url' => ['url/?id=' . $k]];
        }
        return $subItems;
    }

    public static function getMenu()
    {
        $aMenu = array();
        $aNav = Nav::find()->all();

        foreach ($aNav as $aRowMenu) {
            $subitems=[];
            if ($aRowMenu['subitems'] == 'getCourseMenu'){
                $subitems = self::getCourseMenu();
            }
            IF (\Yii::$app->user->can($aRowMenu['url']) or (\Yii::$app->user->can('administer'))) {
                $tmpMenu = [
                    'label' => $aRowMenu['label'],
                    'icon' => $aRowMenu['icon'],
                    'url' => Yii::$app->urlManager->createUrl($aRowMenu['url']),
                    'active' => false, //$aRowMenu['subitems'],
                    'items' => $subitems,
                ];
                if ($aRowMenu['parent_id'] !== 0) {
                    $curMenu =& $aMenu[$aRowMenu['parent_id']];
                    $items =& $curMenu['items'];
                    $items[] = $tmpMenu;
                } else {
                    $aMenu[$aRowMenu['id']] = $tmpMenu;
                }
            }
        }
        return $aMenu;
    }
}
