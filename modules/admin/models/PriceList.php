<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "price_list".
 *
 * @property int $id
 * @property int $service_id
 * @property string $signature
 * @property int $depth
 * @property int $length
 * @property int $deadline Days
 * @property string $description
 * @property double $price
 * @property int $type
 * @property int $status
 *
 * @property Services $service
 */
class PriceList extends \yii\db\ActiveRecord
{
    public $name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'price'], 'required'],
            [['service_id', 'length', 'type', 'status'], 'integer'],
            [['price', 'depth'], 'number'],
            [['deadline'], 'string', 'max' => 15],
            [['signature'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Тип услуги',
            'signature' => 'Подпись',
            'depth' => 'Толщина листа',
            'length' => 'Длина гиба (мм)',
            'deadline' => 'Срок (в днях)',
            'description' => 'Описание',
            'price' => 'Цена',
            'type' => 'Тип',
            'status' => 'Доступ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
