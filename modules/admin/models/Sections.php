<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property int $id
 * @property int $page_id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $img
 * @property string $ico
 * @property int $type
 * @property int $status
 *
 * @property Pages $page
 */
class Sections extends \yii\db\ActiveRecord
{

    public $page;
    //const SCENARIO_MYSPECIAL = 'onUpdate';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'type', 'status'], 'integer'],
            [['title'], 'required'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
            [['ico'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, ico'],
            [['description'], 'string', 'max' => 500],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Страница',
            'title' => 'Названия',
            'alias' => 'Алиас',
            'description' => 'Описание',
            'img' => 'Фото',
            'ico' => 'Значок',
            'type' => 'Тип',
            'status' => 'Доступ',
        ];
    }

    public static function getSectionsByType($type){
        $data = Sections::find()->where(['type' => $type, 'status' => 1])->asArray()->all();
        return $data;
    }

    public static function getSections(){
        $data = Sections::find()->where(['status' => 1])->asArray()->all();
        return $data;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }

}
