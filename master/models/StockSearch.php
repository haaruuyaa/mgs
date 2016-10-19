<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\Stock;

/**
 * StockSearch represents the model behind the search form about `app\master\models\Stock`.
 */
class StockSearch extends Stock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stockid', 'stocktype', 'stockqty'], 'integer'],
            [['stockname', 'stockdateadd', 'datecrt'], 'safe'],
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
        $query = Stock::find();

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
            'stockid' => $this->stockid,
            'stocktype' => $this->stocktype,
            'stockqty' => $this->stockqty,
            'stockdateadd' => $this->stockdateadd,
            'datecrt' => $this->datecrt,
        ]);

        $query->andFilterWhere(['like', 'stockname', $this->stockname]);

        return $dataProvider;
    }
}
