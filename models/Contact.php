<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $message
 * @property int $status 2-confirmed, 1-active, 0-inactive,
 * @property string $created_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'message'], 'required'],
            [['customer_id', 'status'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
