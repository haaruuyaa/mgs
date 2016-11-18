<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\SetoranD;

/**
 * SetoranDSearch represents the model behind the search form about `app\transaction\models\SetoranD`.
 */
class SetoranDSearch extends SetoranD
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SetoranIdD', 'SetoranIdH', 'JenisId', 'HHID', 'DateCrt'], 'safe'],
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
        $query = SetoranD::find();

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
        ]);

        $query->andFilterWhere(['like', 'SetoranIdD', $this->SetoranIdD])
            ->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId])
            ->andFilterWhere(['like', 'HHID', $this->HHID]);

        return $dataProvider;
    }
    
    public function searchSetoranD($params)
    {
        $query = SetoranD::find()
                ->select('mj.JenisName,sd.Qty,sd.HHID,sd.HCID,mc.CustomerName,sd.SetoranIdD,sd.SetoranIdH')
                ->from('SetoranD sd')
                ->leftJoin('MasterJenis mj','mj.JenisId = sd.JenisId')
                ->leftJoin('MasterCustomer mc','mc.CustomerId = sd.CustomerId')
                ->leftJoin('HargaHelper hh','hh.HHID = sd.HHID')
                ->leftJoin('HargaCustomer hc','hc.HCID = sd.HCID')
                ->where(['SetoranIdH' => $params]);

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
        ]);

        $query->andFilterWhere(['like', 'SetoranIdD', $this->SetoranIdD])
            ->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId])
            ->andFilterWhere(['like', 'HHID', $this->HHID]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
          CONCAT(
                  'STD',
                  RIGHT(YEAR(NOW()),2),
                  RIGHT(MONTH(NOW()),2),
                  RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(SetoranIdD,3)),0)+1,CHAR)),3)
          ) AS SetoranIdD 
          FROM setorand
          WHERE SUBSTRING(SetoranIdD,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
