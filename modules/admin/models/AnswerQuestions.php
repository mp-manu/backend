<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "answer_questions".
 *
 * @property int $id
 * @property int $service_id
 * @property string $answer
 * @property string $question
 * @property string $username
 * @property string $phone
 * @property int $type
 * @property int $status
 *
 * @property Services $service
 */
class AnswerQuestions extends \yii\db\ActiveRecord
{
    public $name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer_questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'answer', 'type', 'question'], 'required'],
            [['service_id', 'type', 'status'], 'integer'],
            [['question'], 'string'],
            [['answer'], 'string', 'max' => 500],
            [['username'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
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
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'username' => 'Имя пользователя',
            'phone' => 'Телефон',
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
