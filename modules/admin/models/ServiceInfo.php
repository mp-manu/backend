<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "service_info".
 *
 * @property int $id
 * @property int $service_id
 * @property string $key
 * @property string $val
 * @property string $description
 * @property int $status
 *
 * @property Services $service
 */
class ServiceInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'key', 'val'], 'required'],
            [['service_id', 'status'], 'integer'],
            [['key', 'val'], 'string', 'max' => 255],
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
            'service_id' => 'Услуга',
            'key' => 'Алиас',
            'val' => 'Заголовок',
            'description' => 'Описание',
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
