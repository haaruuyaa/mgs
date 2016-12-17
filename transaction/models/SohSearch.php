<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Soh;

/**
 * SohSearch represents the model behind the search form about `app\transaction\models\Soh`.
 */
class SohSearch extends Soh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOIDH', 'SODate', 'DateCrt'], 'safe'],
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
        $query = Soh::find()->where(['SetoranIdH' => NULL])->orderBy(['SODate' => SORT_DESC]);

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
            'SODate' => $this->SODate,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'SOIDH', $this->SOIDH]);

        return $dataProvider;
    }

    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'SOH',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(soidh,3)),0)+1,CHAR)),3)
        ) AS soidh
        FROM soh
        WHERE SUBSTRING(soidh,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();

        return $genId;
    }
}
