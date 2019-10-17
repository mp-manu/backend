<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "privacy_policy".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string $description
 * @property int $status
 */
class PrivacyPolicy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privacy_policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['description'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Имя раздела',
            'title' => 'Заголовок',
            'description' => 'Текст',
            'status' => 'Статус',
        ];
    }

    public static function getParentsNameById($id){
       $data = PrivacyPolicy::find()->where(['id' => $id, 'status' => 1])->asArray()->one();
       return $data;

    }

   public static function getAllParents(){
      $data = PrivacyPolicy::find()->where(['parent_id' => 0, 'status' => 1])->all();
      return $data;
   }
}
