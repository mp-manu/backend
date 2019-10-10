<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_by_drawing".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $file
 * @property int $status 1-active, 2-confirm, 0-denied
 * @property string $created_at
 */
class OrderByDrawing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_by_drawing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['file'], 'string', 'max' => 500],
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
            'file' => 'File',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
