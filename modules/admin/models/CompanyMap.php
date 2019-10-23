<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "company_map".
 *
 * @property int $id
 * @property double $center1
 * @property double $center2
 * @property double $coord1
 * @property double $coord2
 * @property int $zoom
 * @property string $address
 * @property string $image
 * @property int $size1
 * @property int $size2
 * @property int $offset1
 * @property int $offset2
 */
class CompanyMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['center1', 'center2', 'coord1', 'coord2'], 'number'],
            [['zoom', 'size1', 'size2', 'offset1', 'offset2'], 'integer'],
            [['address'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'center1' => 'Center1',
            'center2' => 'Center2',
            'coord1' => 'Coord1',
            'coord2' => 'Coord2',
            'zoom' => 'Zoom',
            'address' => 'Address',
            'image' => 'Image',
            'size1' => 'Size1',
            'size2' => 'Size2',
            'offset1' => 'Offset1',
            'offset2' => 'Offset2',
        ];
    }
}
