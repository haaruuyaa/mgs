<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\PengeluaranH;

/**
 * PengeluaranHSearch represents the model behind the search form about `app\transaction\models\PengeluaranH`.
 */
class PengeluaranHSearch extends PengeluaranH
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranIdH'], 'integer'],
            [['SetoranIdH', 'Date', 'DateCrt'], 'safe'],
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
        $query = PengeluaranH::find();

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
            'PengeluaranIdH' => $this->PengeluaranIdH,
            'Date' => $this->Date,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'APH',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(PengeluaranIdH,3)),0)+1,CHAR)),3)
        ) AS PengeluaranIdH 
        FROM pengeluaranh
        WHERE SUBSTRING(PengeluaranIdH,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
