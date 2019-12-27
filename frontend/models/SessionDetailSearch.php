<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Sessiondetail;
use Yii;

/**
 * SessiondetailSearch represents the model behind the search form of `frontend\models\Sessiondetail`.
 */
class SessiondetailSearch extends Sessiondetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_detail_id', 'product_id'], 'integer'],
            [['session_id', 'redirect_flow_id', 'db'], 'safe'],
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
        $query = Sessiondetail::find();

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
            'session_detail_id' => $this->session_detail_id,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'session_id', $this->session_id])
            ->andFilterWhere(['like', 'redirect_flow_id', $this->redirect_flow_id])
            ->andFilterWhere(['like', 'db', $this->db]);

        return $dataProvider;
    }
}
