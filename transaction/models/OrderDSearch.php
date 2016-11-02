<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\OrderD;

/**
 * OrderDSearch represents the model behind the search form about `app\transaction\models\OrderD`.
 */
class OrderDSearch extends OrderD
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderIdD', 'OrderIdH', 'CustomerId', 'JenisId', 'IDHC', 'DateCrt', 'DateUpdate'], 'safe'],
            [['Qty'], 'integer'],
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
        $query = OrderD::find();

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
            'Qty' => $this->Qty,
            'DateCrt' => $this->DateCrt,
            'DateUpdate' => $this->DateUpdate,
        ]);

        $query->andFilterWhere(['like', 'OrderIdD', $this->OrderIdD])
            ->andFilterWhere(['like', 'OrderIdH', $this->OrderIdH])
            ->andFilterWhere(['like', 'CustomerId', $this->CustomerId])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId])
            ->andFilterWhere(['like', 'IDHC', $this->IDHC]);

        return $dataProvider;
    }
}
