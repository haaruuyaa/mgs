<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\Tipe;

/**
 * TipeSearch represents the model behind the search form about `app\master\models\Tipe`.
 */
class TipeSearch extends Tipe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipeid'], 'integer'],
            [['tipename'], 'safe'],
            [['isactive'], 'boolean'],
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
        $query = Tipe::find()->where(['isactive' => '1']);

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
            'tipeid' => $this->tipeid,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'tipename', $this->tipename]);

        return $dataProvider;
    }
}
