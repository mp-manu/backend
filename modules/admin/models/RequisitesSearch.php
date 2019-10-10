<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requisites;

/**
 * RequisitesSearch represents the model behind the search form of `app\models\Requisites`.
 */
class RequisitesSearch extends Requisites
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['legal_address', 'mailing_address', 'inn', 'kpp', 'rs', 'ks', 'okpo'], 'safe'],
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
        $query = Requisites::find();

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
        ]);

        $query->andFilterWhere(['like', 'legal_address', $this->legal_address])
            ->andFilterWhere(['like', 'mailing_address', $this->mailing_address])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'kpp', $this->kpp])
            ->andFilterWhere(['like', 'rs', $this->rs])
            ->andFilterWhere(['like', 'ks', $this->ks])
            ->andFilterWhere(['like', 'okpo', $this->okpo]);

        return $dataProvider;
    }
}
