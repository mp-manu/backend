<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $img
 * @property string $url
 * @property int $status
 *
 * @property AnswerQuestions[] $answerQuestions
 * @property PriceList[] $priceLists
 * @property ServiceInfo[] $serviceInfos
 * @property WorkProccess[] $workProccesses
 */
class Services extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 150],
            [['url'], 'string', 'max' => 500],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Категория',
            'name' => 'Имя',
            'alias' => 'Алиас',
            'description' => 'Описание',
            'img' => 'Фото',
            'url' => 'Ссылка',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerQuestions()
    {
        return $this->hasMany(AnswerQuestions::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceLists()
    {
        return $this->hasMany(PriceList::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInfos()
    {
        return $this->hasMany(ServiceInfo::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkProccesses()
    {
        return $this->hasMany(WorkProccess::className(), ['service_id' => 'id']);
    }

    public static function getRandomServices(){
        $data = Services::find()
            ->where(['status' => 1])->andWhere(['<>', 'id', '1'])
            ->orderBy('RAND()')
            ->limit(4)
            ->asArray()
            ->all();
        return $data;
    }

    public static function getServices(){

        $data = Services::find()->where(['status' => 1])->asArray()->all();
        return $data;
    }
}
