<?php

namespace app\modules\admin\models\search;

use yii\data\ActiveDataProvider;
use app\modules\admin\models\ImageModel;


class ImageSearch extends ImageModel
{
    /**
     * @var int the default page size
     */
    public $pageSize = 10;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'section', 'key', 'value', 'status', 'img', 'description'], 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(array $params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'status' => $this->status,
            'section' => $this->section,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
