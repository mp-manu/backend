<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "call_request".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $status 1-active, 2-confirm, 0-denied
 * @property string $created_at
 */
class CallRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'status'], 'integer'],
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
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
