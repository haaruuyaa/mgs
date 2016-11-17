<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\PengeluaranD;

/**
 * PengeluaranDSearch represents the model behind the search form about `app\transaction\models\PengeluaranD`.
 */
class PengeluaranDSearch extends PengeluaranD
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranIdD', 'PengeluaranIdH', 'Description', 'DateCrt'], 'safe'],
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
        $query = PengeluaranD::find();

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

        $query->andFilterWhere(['like', 'PengeluaranIdD', $this->PengeluaranIdD])
            ->andFilterWhere(['like', 'PengeluaranIdH', $this->PengeluaranIdH])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
    
    public function searchPengD($params)
    {
        $query = PengeluaranD::find()
                ->select("*")
                ->from("PengeluaranD pd")
                ->leftJoin('PengeluaranH ph','ph.PengeluaranIdH = pd.PengeluaranIdH')
                ->leftJoin('SetoranH sh','sh.SetoranIdH = ph.SetoranIdH')
                ->where(['sh.SetoranIdH' => $params]);

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

        $query->andFilterWhere(['like', 'PengeluaranIdD', $this->PengeluaranIdD])
            ->andFilterWhere(['like', 'PengeluaranIdH', $this->PengeluaranIdH])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'APD',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(PengeluaranIdD,3)),0)+1,CHAR)),3)
        ) AS PengeluaranIdD 
        FROM pengeluarand
        WHERE SUBSTRING(PengeluaranIdD,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
