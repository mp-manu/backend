<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "metatags_yandex_metrika".
 *
 * @property int $id
 * @property string $tags
 * @property string $scripts
 * @property string $description
 * @property int $type
 * @property int $status
 */
class MetatagsYandexMetrika extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metatags_yandex_metrika';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tags', 'scripts', 'description'], 'string'],
            [['type', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tags' => 'Метатеги',
            'scripts' => 'Код метрик',
            'description' => 'Описание',
            'type' => 'Тип',
            'status' => 'Статус',
        ];
    }
}
