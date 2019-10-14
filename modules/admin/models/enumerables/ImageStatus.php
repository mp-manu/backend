<?php

namespace app\modules\admin\models\enumerables;

use yii2mod\enum\helpers\BaseEnum;


class ImageStatus extends BaseEnum
{
    const ACTIVE = 1;
    const INACTIVE = 0;


    public static $messageCategory = 'yii2mod.settings';


    public static $list = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];
}
