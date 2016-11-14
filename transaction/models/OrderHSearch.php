<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\OrderH;

/**
 * OrderHSearch represents the model behind the search form about `app\transaction\models\OrderH`.
 */
class OrderHSearch extends OrderH
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderIdH', 'OrderDate', 'DateCrt'], 'safe'],
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
        $query = OrderH::find();

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
            'OrderDate' => $this->OrderDate,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'OrderIdH', $this->OrderIdH]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
          CONCAT(
                  'ODH',
                  RIGHT(YEAR(NOW()),2),
                  RIGHT(MONTH(NOW()),2),
                  RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(OrderIdH,3)),0)+1,CHAR)),3)
          ) AS OrderIdH 
          FROM orderh
          WHERE SUBSTRING(OrderIdH,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
