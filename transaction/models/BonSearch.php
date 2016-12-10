<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Bon;

/**
 * BonSearch represents the model behind the search form about `app\transaction\models\Bon`.
 */
class BonSearch extends Bon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BonId', 'HelperId', 'Description', 'Date', 'Tipe', 'DatePaid', 'DateCrt'], 'safe'],
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
        $query = Bon::find()
            ->select('*')
            ->from('Bon b')
            ->leftJoin('MasterHelper mh','mh.HelperId = b.HelperId')
            ->orderBy(['b.Tipe' => SORT_DESC,'b.HelperId' => SORT_ASC,'b.Date' => SORT_ASC])
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
            'Amount' => $this->Amount,
            'Date' => $this->Date,
            'DatePaid' => $this->DatePaid,
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'BonId', $this->BonId])
            ->andFilterWhere(['like', 'HelperId', $this->HelperId])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Tipe', $this->Tipe]);

        return $dataProvider;
    }

    public function GenerateId()
    {
        $genId = Yii::$app->db->createCommand("SELECT
        CONCAT(
                'BON',
                RIGHT(YEAR(NOW()),2),
                RIGHT(MONTH(NOW()),2),
                RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(BonId,3)),0)+1,CHAR)),3)
        ) AS BonId 
        FROM Bon
        WHERE SUBSTRING(BonId,4,4) = CONCAT(RIGHT(YEAR(NOW()),2),RIGHT(MONTH(NOW()),2))")->queryScalar();
        
        return $genId;
    }
}
