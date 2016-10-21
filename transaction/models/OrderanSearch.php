<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Orderan;

/**
 * OrderanSearch represents the model behind the search form about `app\transaction\models\Orderan`.
 */
class OrderanSearch extends Orderan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid', 'tipeid', 'customerid', 'orderdate', 'dateadd', 'dateupdate'], 'safe'],
            [['qty'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Orderan::find();

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
            'qty' => $this->qty,
            'orderdate' => $this->orderdate,
            'dateadd' => $this->dateadd,
            'dateupdate' => $this->dateupdate,
        ]);

        $query->andFilterWhere(['like', 'orderid', $this->orderid])
            ->andFilterWhere(['like', 'tipeid', $this->tipeid])
            ->andFilterWhere(['like', 'customerid', $this->customerid]);

        return $dataProvider;
    }
}
