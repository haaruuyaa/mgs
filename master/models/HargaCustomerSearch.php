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
            [['HCID', 'CustomerId','JenisId'], 'safe'],
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
        $query = HargaCustomer::find()
                ->select("mc.CustomerName as CustomerName,hc.Price as Price,hc.CustomerId as CustomerId,mj.JenisName,mj.JenisId,hc.HCID")
                ->from("HargaCustomer hc")
                ->leftJoin('MasterCustomer mc','mc.CustomerId = hc.CustomerId')
                ->leftJoin('MasterJenis mj','mj.JenisId = hc.JenisId')
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
            'Price' => $this->Price,
        ]);

        $query->andFilterWhere(['like', 'HCID', $this->HCID])
            ->andFilterWhere(['like', 'CustomerName', $this->CustomerId])
            ->andFilterWhere(['like', 'JenisName', $this->JenisId]);

        return $dataProvider;
    }

    public function GetHarga($Cus,$Jen)
    {
        $query = HargaCustomer::find()->where(['CustomerId' => $Cus,'JenisId' => $Jen])->one();

        return $query;

    }
}
