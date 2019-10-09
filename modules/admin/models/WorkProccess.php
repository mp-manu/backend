<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "work_proccess".
 *
 * @property int $id
 * @property int $service_id
 * @property string $title
 * @property string $description
 * @property string $img
 * @property int $status
 *
 * @property Services $service
 */
class WorkProccess extends \yii\db\ActiveRecord
{
    public $name;
    const SCENARIO_MYSPECIAL = 'onUpdate';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_proccess';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'title'], 'required'],
            [['img'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['img'], 'safe', 'on' => self::SCENARIO_MYSPECIAL],
            [['service_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['description', 'img'], 'string', 'max' => 500],
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
            'title' => 'Название процесса',
            'description' => 'Описание',
            'img' => 'Фото',
            'status' => 'Статус',
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
