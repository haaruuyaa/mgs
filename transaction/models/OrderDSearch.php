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
    
    public function searchOrderD($params)
    {
        $query = OrderD::find()
                ->select('od.CustomerId,mj.JenisId,hc.Price,od.Qty,mj.JenisName,mc.CustomerName')
                ->from('OrderD od')
                ->leftJoin('HargaCustomer hc','hc.HCID = od.IDHC')
                ->leftJoin('MasterJenis mj','mj.JenisId = od.JenisId')
                ->leftJoin('MasterCustomer mc','mc.CustomerId = od.CustomerId')
                ->where(['OrderIdH' => $params])
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
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
          CONCAT(
                  'ODD',
                  RIGHT(YEAR(NOW()),2),
                  RIGHT(MONTH(NOW()),2),
                  RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(OrderIdD,3)),0)+1,CHAR)),3)
          ) AS OrderIdD 
          FROM orderd
          WHERE SUBSTRING(OrderIdD,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
