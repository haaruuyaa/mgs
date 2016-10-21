<?php

namespace app\transaction\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\transaction\models\Setoran;

/**
 * SetoranSearch represents the model behind the search form about `app\transaction\models\Setoran`.
 */
class SetoranSearch extends Setoran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setoranid', 'helperid', 'tipeid', 'jenisid', 'date', 'datecrt'], 'safe'],
            [['qty'], 'integer'],
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
        $query = Setoran::find();

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
            'qty' => $this->qty,
            'date' => $this->date,
            'datecrt' => $this->datecrt,
        ]);

        $query->andFilterWhere(['like', 'setoranid', $this->setoranid])
            ->andFilterWhere(['like', 'helperid', $this->helperid])
            ->andFilterWhere(['like', 'tipeid', $this->tipeid])
            ->andFilterWhere(['like', 'jenisid', $this->jenisid]);

        return $dataProvider;
    }
}
