<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\enumerables\ImageStatus;
use app\modules\admin\models\enumerables\ImageType;
use app\modules\admin\models\ImageQuery;

/**
 * This is the model class for table "{{%image_manager}}".
 *
 * @property int $id
 * @property string $type
 * @property string $section
 * @property string $key
 * @property string $img
 * @property string $value
 * @property bool $status
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class ImageModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image_manager}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'key',  'img'], 'required'],
            [['section', 'key'], 'unique', 'targetAttribute' => ['section', 'key']],
            [['value', 'type'], 'string'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, ico'],
            [['section', 'key', 'description'], 'string', 'max' => 255],
            [['status'], 'integer'],
            ['status', 'default', 'value' => ImageStatus::ACTIVE],
            ['status', 'in', 'range' => ['1', '0']],
            [['type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii2mod.settings', 'ID'),
            'type' => Yii::t('yii2mod.settings', 'Type'),
            'section' => Yii::t('yii2mod.settings', 'Section'),
            'key' => Yii::t('yii2mod.settings', 'Key'),
            'value' => Yii::t('yii2mod.settings', 'Value'),
            'img' => Yii::t('yii2mod.settings', 'Фото'),
            'status' => Yii::t('yii2mod.settings', 'Status'),
            'description' => Yii::t('yii2mod.settings', 'Description'),
            'created_at' => Yii::t('yii2mod.settings', 'Created Date'),
            'updated_at' => Yii::t('yii2mod.settings', 'Updated Date'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Creates an [[ActiveQueryInterface]] instance for query purpose.
     *
     * @return ImageQuery
     */
    public static function find():ImageQuery
    {
        return new ImageQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        parent::afterDelete();

        Yii::$app->images->invalidateCache();
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        Yii::$app->images->invalidateCache();
    }

    /**
     * Return array of settings
     *
     * @return array
     */
    public function getSettings()
    {
        $result = [];
        $settings = static::find()->select(['type', 'section', 'key', 'value'])->active()->asArray()->all();

        foreach ($settings as $setting) {
            $section = $setting['section'];
            $key = $setting['key'];
            $settingOptions = ['type' => $setting['type'], 'value' => $setting['value']];

            if (isset($result[$section][$key])) {
                ArrayHelper::merge($result[$section][$key], $settingOptions);
            } else {
                $result[$section][$key] = $settingOptions;
            }
        }

        return $result;
    }

    public function setSetting($section, $key, $value, $type = null)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if (empty($model)) {
            $model = new static();
        }

        $model->section = $section;
        $model->key = $key;
        $model->value = strval($value);

        if ($type !== null && ArrayHelper::keyExists($type, ImageType::getConstantsByValue())) {
            $model->type = $type;
        } else {
            $model->type = gettype($value);
        }

        return $model->save();
    }

    /**
     * Remove setting
     *
     * @param $section
     * @param $key
     *
     * @return bool|int|null
     *
     * @throws \Exception
     */
    public function removeSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if (!empty($model)) {
            return $model->delete();
        }

        return false;
    }

    /**
     * Remove all settings
     *
     * @return int
     */
    public function removeAllSettings()
    {
        return static::deleteAll();
    }

    /**
     * Activates a setting
     *
     * @param $section
     * @param $key
     *
     * @return bool
     */
    public function activateSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model && $model->status === ImageStatus::INACTIVE) {
            $model->status = ImageType::ACTIVE;

            return $model->save(true, ['status']);
        }

        return false;
    }

    /**
     * Deactivates a setting
     *
     * @param $section
     * @param $key
     *
     * @return bool
     */
    public function deactivateSetting($section, $key)
    {
        $model = static::findOne(['section' => $section, 'key' => $key]);

        if ($model && $model->status === ImageStatus::ACTIVE) {
            $model->status = ImageType::INACTIVE;

            return $model->save(true, ['status']);
        }

        return false;
    }
}
