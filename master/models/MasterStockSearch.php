<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\MasterStock;

/**
 * MasterStockSearch represents the model behind the search form about `app\master\models\MasterStock`.
 */
class MasterStockSearch extends MasterStock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockId', 'StockQty'], 'integer'],
            [['JenisId', 'StockDateAdd', 'DateCrt'], 'safe'],
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
        $query = MasterStock::find()
                ->select("*")
                ->from("MasterStock ms")
                ->leftJoin("MasterJenis mj","mj.JenisId = ms.JenisId")
                ;

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
            'StockId' => $this->StockId,
            'StockQty' => $this->StockQty,
            'StockDateAdd' => $this->StockDateAdd,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'JenisName', $this->JenisId]);

        return $dataProvider;
    }
}
