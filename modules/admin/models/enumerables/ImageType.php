<?php

namespace app\modules\admin\models\enumerables;

use yii2mod\enum\helpers\BaseEnum;


class ImageType extends BaseEnum
{
    //const PHOTO = 'string';
    const STRING_TYPE = 'string';
    const INTEGER_TYPE = 'integer';
    const BOOLEAN_TYPE = 'boolean';
    const FLOAT_TYPE = 'float';
    const NULL_TYPE = 'null';

    /**
     * @var string message category
     */
    public static $messageCategory = 'yii2mod.settings';

    /**
     * @var array
     */
    public static $list = [
        //self::PHOTO => 'String',
        self::STRING_TYPE => 'String',
        self::STRING_TYPE => 'String',
        self::INTEGER_TYPE => 'Integer',
        self::BOOLEAN_TYPE => 'Boolean',
        self::FLOAT_TYPE => 'Float',
        self::NULL_TYPE => 'Null',
    ];
}
