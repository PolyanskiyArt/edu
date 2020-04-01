<?php

namespace app\models\valueObject;

use justcoded\yii2\rbac\models\Item;

class RoleValueObject extends Item
{
    const ROLE_STUDENT = 'Student';
    const ROLE_TEACHER = 'Teacher';
}
