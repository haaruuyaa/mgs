<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\StockHelper;

/**
 * StockHelperSearch represents the model behind the search form about `app\master\models\StockHelper`.
 */
class StockHelperSearch extends StockHelper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockHelpId', 'HelperId', 'JenisId', 'DateAdd', 'DateUpdate', 'DateCrt'], 'safe'],
            [['Isi', 'Kosong'], 'integer'],
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
        $query = StockHelper::find()
              ->select('*')
              ->from('StockHelper sth')
              ->leftJoin('MasterJenis mj','mj.JenisId = sth.JenisId')
              ->where(['sth.HelperId' => $params])
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
            'Isi' => $this->Isi,
            'Kosong' => $this->Kosong,
            'DateAdd' => $this->DateAdd,
            'DateUpdate' => $this->DateUpdate,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'StockHelpId', $this->StockHelpId])
            ->andFilterWhere(['like', 'HelperId', $this->HelperId])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId]);

        return $dataProvider;
    }

    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'STK',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(StockHelpId,3)),0)+1,CHAR)),3)
        ) AS StockHelpId
        FROM StockHelper
        WHERE SUBSTRING(StockHelpId,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();

        return $genId;
    }
}
