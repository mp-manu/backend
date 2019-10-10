<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requisites".
 *
 * @property int $id
 * @property string $legal_address
 * @property string $mailing_address
 * @property string $inn
 * @property string $kpp
 * @property string $rs
 * @property string $ks
 * @property string $okpo
 */
class Requisites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requisites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['legal_address', 'mailing_address'], 'string', 'max' => 250],
            [['inn', 'kpp', 'okpo'], 'string', 'max' => 12],
            [['rs', 'ks'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'legal_address' => 'Legal Address',
            'mailing_address' => 'Mailing Address',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'rs' => 'Rs',
            'ks' => 'Ks',
            'okpo' => 'Okpo',
        ];
    }
}
