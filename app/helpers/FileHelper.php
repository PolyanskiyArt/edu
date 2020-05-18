<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 03.04.2020
 * Time: 17:23
 */

namespace app\helpers;

use yii\imagine\Image;

class FileHelper
{

    const MAXWIDTH = 168;
    const MAXHEIGHT = 168;

    public static function genImageName(string $courseGroupId, string $userId, string $extention = 'jpg'): string
    {
        $file = $courseGroupId . '_' . $userId . '.' . $extention;

        return $file;
    }

    public static function genAvatarName(string $userId, string $extention = 'jpg'): string
    {
        $file = $userId . '.' . $extention;

        return $file;
    }

    public static function resizeImage(string $file)
    {
        Image::resize($file, self::MAXWIDTH, self::MAXHEIGHT)->save($file, ['quality' => 80]);
    }
}