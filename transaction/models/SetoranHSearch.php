<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\SetoranH;

/**
 * SetoranHSearch represents the model behind the search form about `app\transaction\models\SetoranH`.
 */
class SetoranHSearch extends SetoranH
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SetoranIdH', 'HelperId', 'Date', 'DateCrt'], 'safe'],
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
        $query = SetoranH::find()
                ->select('*')
                ->from('SetoranH sh')
                ->leftJoin('MasterHelper mh','mh.HelperId = sh.HelperId')
                ->orderBy(['Date' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Date' => $this->Date,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'SetoranIdH', $this->SetoranIdH])
            ->andFilterWhere(['like', 'HelperName', $this->HelperId]);

        return $dataProvider;
    }

    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
          CONCAT(
                  'STH',
                  RIGHT(YEAR(NOW()),2),
                  RIGHT(LPAD(MONTH(NOW()), 2, '0'),2),
                  RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(SetoranIdH,3)),0)+1,CHAR)),3)
          ) AS SetoranIdH
          FROM setoranh
          WHERE SUBSTRING(SetoranIdH,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();

        return $genId;
    }
}
