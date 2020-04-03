<?php
/**
 * Created by PhpStorm.
 * User: papaha
 * Date: 03.04.2020
 * Time: 17:23
 */

namespace app\helpers;


class FileHelper
{

    public static function genImageName(string $courseGroupId, string $userId, string $extention = 'jpg'): string
    {
        $file = $courseGroupId . '_' . $userId . '.' . $extention;

        return $file;
    }
}