<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\So;

/**
 * SoSearch represents the model behind the search form about `app\transaction\models\So`.
 */
class SoSearch extends So
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOID', 'SODate', 'JenisId', 'HelperId', 'datecrt'], 'safe'],
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
        $query = So::find();

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
            'SODate' => $this->SODate,
            'Qty' => $this->Qty,
            'datecrt' => $this->datecrt,
        ]);

        $query->andFilterWhere(['like', 'SOID', $this->SOID])
            ->andFilterWhere(['like', 'JenisId', $this->JenisId])
            ->andFilterWhere(['like', 'HelperId', $this->HelperId]);

        return $dataProvider;
    }
}
