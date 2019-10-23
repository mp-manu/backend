<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property int $service_id
 * @property string $name
 * @property string $description
 * @property string $deadline
 * @property string $productivity
 * @property string $img
 * @property string $status
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'name'], 'required'],
            [['service_id'], 'integer'],
            [['name', 'deadline', 'productivity'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Услуга',
            'name' => 'Название',
            'description' => 'Описание',
            'deadline' => 'Срок использование',
            'productivity' => 'Производительность',
            'img' => 'Фото',
            'status' => 'Статус',
        ];
    }
}
