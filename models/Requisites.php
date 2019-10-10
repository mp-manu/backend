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
 * @property string $status
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
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'legal_address' => 'Юридический адрес',
            'mailing_address' => 'Почтовый адрес',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'rs' => 'Р/С',
            'ks' => 'К/С',
            'okpo' => 'ОКПО',
            'status' => 'Доступ',
        ];
    }
}
