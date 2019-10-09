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
 * @property int $type
 * @property int $status
 *
 * @property Pages $page
 */
class Sections extends \yii\db\ActiveRecord
{
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
            'page_id' => 'Page ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }
}
