<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property string $organization
 * @property int $status 1-active, 0-inactive
 * @property string $created_at
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'organization'], 'string', 'max' => 500],
            [['phone_number'], 'string', 'max' => 18],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'organization' => 'Organization',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
