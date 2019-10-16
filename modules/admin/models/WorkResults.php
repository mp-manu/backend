<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "work_results".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $deadline
 * @property double $price
 * @property double $service_id
 * @property string $tooked_metall
 * @property string $img
 * @property string $status
 */
class WorkResults extends \yii\db\ActiveRecord
{
    const SCENARIO_MYSPECIAL = 'onUpdate';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'service_id'], 'required'],
            [['img'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['img'], 'safe', 'on' => self::SCENARIO_MYSPECIAL],
            [['status'], 'integer'],
            [['name', 'description', 'img'], 'string', 'max' => 500],
            [['deadline'], 'string', 'max' => 200],
            [['tooked_metall'], 'string', 'max' => 20],
            [['price'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'deadline' => 'Срок выполнения',
            'price' => 'Стоимость',
            'service_id' => 'Услуга',
            'tooked_metall' => 'Потребовалось металла',
            'img' => 'Фото',
            'status' => 'Доступ',
        ];
    }
}
