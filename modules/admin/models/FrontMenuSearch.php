<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\FrontMenu;

/**
 * FrontMenuSearch represents the model behind the search form of `app\modules\admin\models\FrontMenu`.
 */
class FrontMenuSearch extends FrontMenu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nodeid', 'parentnodeid', 'nodeaccess', 'nodestatus', 'nodeorder'], 'integer'],
            [['nodeshortname', 'nodename', 'nodeurl', 'userstatus', 'nodefile', 'nodeicon', 'ishasdivider', 'hasnotify', 'notifyscript', 'isforguest', 'arrow_tag', 'position'], 'safe'],
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
        $query = FrontMenu::find();

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
            'nodeid' => $this->nodeid,
            'parentnodeid' => $this->parentnodeid,
            'nodeaccess' => $this->nodeaccess,
            'nodestatus' => $this->nodestatus,
            'nodeorder' => $this->nodeorder,
        ]);

        $query->andFilterWhere(['like', 'nodeshortname', $this->nodeshortname])
            ->andFilterWhere(['like', 'nodename', $this->nodename])
            ->andFilterWhere(['like', 'nodeurl', $this->nodeurl])
            ->andFilterWhere(['like', 'userstatus', $this->userstatus])
            ->andFilterWhere(['like', 'nodefile', $this->nodefile])
            ->andFilterWhere(['like', 'nodeicon', $this->nodeicon])
            ->andFilterWhere(['like', 'ishasdivider', $this->ishasdivider])
            ->andFilterWhere(['like', 'hasnotify', $this->hasnotify])
            ->andFilterWhere(['like', 'notifyscript', $this->notifyscript])
            ->andFilterWhere(['like', 'isforguest', $this->isforguest])
            ->andFilterWhere(['like', 'arrow_tag', $this->arrow_tag])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
