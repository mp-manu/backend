<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\PriceList;

/**
 * PriceListSearch represents the model behind the search form of `app\modules\admin\models\PriceList`.
 */
class PriceListSearch extends PriceList
{
    public $name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'service_id', 'depth', 'length',  'type', 'status'], 'integer'],
            [['signature', 'description', 'deadline'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PriceList::find()->select('p.*, s.name')->from('price_list p')
            ->innerJoin('services s', 'p.service_id=s.id')
            ->orderBy('p.service_id, depth, length');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'service_id' => $this->service_id,
            'depth' => $this->depth,
            'length' => $this->length,
            'deadline' => $this->deadline,
            'price' => $this->price,
            'type' => $this->type,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'signature', $this->signature])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
