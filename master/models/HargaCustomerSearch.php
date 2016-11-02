<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\HargaCustomer;

/**
 * HargaCustomerSearch represents the model behind the search form about `app\master\models\HargaCustomer`.
 */
class HargaCustomerSearch extends HargaCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HCID', 'CustomerId'], 'safe'],
            [['Price'], 'number'],
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
        $query = HargaCustomer::find();

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
            'Price' => $this->Price,
        ]);

        $query->andFilterWhere(['like', 'HCID', $this->HCID])
            ->andFilterWhere(['like', 'CustomerId', $this->CustomerId]);

        return $dataProvider;
    }
}
