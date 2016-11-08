<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Sod;

/**
 * SodSearch represents the model behind the search form about `app\transaction\models\Sod`.
 */
class SodSearch extends Sod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOIDD', 'SOIDH', 'JenisId', 'HelperId', 'DateCrt'], 'safe'],
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
        $query = Sod::find()
                ->select("mh.HelperName,mj.JenisName,Sod.Qty")
                ->leftJoin('MasterJenis mj','mj.JenisId = Sod.JenisId')
                ->leftJoin('MasterHelper mh','mh.HelperId = Sod.HelperId')
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
        ]);

        $query->andFilterWhere(['like', 'SOIDD', $this->SOIDD])
            ->andFilterWhere(['like', 'SOIDH', $this->SOIDH])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId])
            ->andFilterWhere(['like', 'HelperId', $this->HelperId]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'SOD',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(soidd,3)),0)+1,CHAR)),3)
        ) AS soidd 
        FROM sod
        WHERE SUBSTRING(soidd,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
