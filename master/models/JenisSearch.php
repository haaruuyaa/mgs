<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\Jenis;

/**
 * JenisSearch represents the model behind the search form about `app\master\models\Jenis`.
 */
class JenisSearch extends Jenis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenisid', 'jenisname'], 'safe'],
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
        $query = Jenis::find();

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
        $query->andFilterWhere(['like', 'jenisid', $this->jenisid])
            ->andFilterWhere(['like', 'jenisname', $this->jenisname]);

        return $dataProvider;
    }
}
