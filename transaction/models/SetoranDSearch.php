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
}
