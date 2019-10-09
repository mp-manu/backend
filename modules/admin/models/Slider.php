<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "slider".
 *
 * @property int $id Id
 * @property string $title Title
 * @property string $description Description
 * @property string $img_url Image Url
 * @property string $slide_cover Slide Cover
 * @property int $is_has_btn Is Has Button
 * @property string $btn_title Button Title
 * @property string $btn_link Button Link
 * @property int $order Order
 * @property int $access Status
 */
class Slider extends \yii\db\ActiveRecord
{
    const SCENARIO_MYSPECIAL = 'onUpdate';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_url'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['img_url'], 'safe', 'on' => self::SCENARIO_MYSPECIAL],
            [['is_has_btn', 'order', 'access'], 'integer'],
            [['title', 'description',  'btn_link'], 'string', 'max' => 500],
            [['img_url'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
            [['slide_cover'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg'],
            [['btn_title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'img_url' => 'Img Url',
            'slide_cover' => 'Slide Cover',
            'is_has_btn' => 'Is Has Btn',
            'btn_title' => 'Btn Title',
            'btn_link' => 'Btn Link',
            'order' => 'Order',
            'access' => 'Access',
        ];
    }


    public static function getSliders(){

        $data = Slider::find()->where(['access' => 1])->orderBy('order')->asArray()->all();
        return $data;
    }

    public static function getSlidersWithoutMe($id){

        $data = Slider::find()->where(['access' => 1])->andWhere(['<>', 'id', $id])->orderBy('order')->asArray()->all();
        return $data;
    }

    public static function getOrders(){

        $data = Slider::find()->where(['access' => 1])->orderBy('order')->asArray()->all();
        return $data;
    }

    public static function setSlideOrder($order){
        if($order == -1){
            $max_order = Slider::find()->max('slider.order');
            $max_order += 1;
            return $max_order;
        }elseif($order == 0){
            Yii::$app->db->createCommand('UPDATE slider s SET s.order = s.order + 1');
            return '0';
        }else{
            $slide_order = $order + 1;
            Yii::$app->db->createCommand('UPDATE slider s SET s.order = s.order+1 WHERE s.order >= '.$order);
            return $slide_order;
        }
    }
}
