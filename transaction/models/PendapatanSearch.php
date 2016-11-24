<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Pendapatan;

/**
 * PendapatanSearch represents the model behind the search form about `app\transaction\models\Pendapatan`.
 */
class PendapatanSearch extends Pendapatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PendapatanId', 'SetoranIdH', 'Description', 'DateCrt'], 'safe'],
            [['Amount'], 'number'],
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
        $query = Pendapatan::find();

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
            'Amount' => $this->Amount,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'PendapatanId', $this->PendapatanId])
            ->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
    
     public function searchPend($params)
    {
        $query = Pendapatan::find()->where(['SetoranIdH' => $params]);

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
            'Amount' => $this->Amount,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'PendapatanId', $this->PendapatanId])
            ->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'ARH',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(PendapatanId,3)),0)+1,CHAR)),3)
        ) AS PendapatanId 
        FROM pendapatan
        WHERE SUBSTRING(PendapatanId,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
