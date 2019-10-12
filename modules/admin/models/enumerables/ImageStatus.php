<?php

namespace app\modules\admin\models\enumerables;

use yii2mod\enum\helpers\BaseEnum;

/**
 * Class SettingStatus
 *
 * @package yii2mod\settings\models\enumerables
 */
class ImageStatus extends BaseEnum
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * @var string message category
     */
    public static $messageCategory = 'yii2mod.settings';

    /**
     * @var array
     */
    public static $list = [
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Inactive',
    ];
}
