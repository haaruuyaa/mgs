<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\MasterCustomer;

/**
 * MasterCustomerSearch represents the model behind the search form about `app\master\models\MasterCustomer`.
 */
class MasterCustomerSearch extends MasterCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustomerId', 'CustomerName', 'CustomerPhone'], 'safe'],
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
        $query = MasterCustomer::find();

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
        $query->andFilterWhere(['like', 'CustomerId', $this->CustomerId])
            ->andFilterWhere(['like', 'CustomerName', $this->CustomerName])
            ->andFilterWhere(['like', 'CustomerPhone', $this->CustomerPhone]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $query = Yii::$app->db->createCommand("
            SELECT
            CONCAT(
                    'CUS',
                    RIGHT(CONCAT('000',CONVERT(IFNULL(MAX(RIGHT(CustomerId,4)),0)+1,CHAR)),4)
            ) AS CustomerId 
            FROM MasterCustomer
            ;")->queryScalar();
        
        return $query;
    }
}
