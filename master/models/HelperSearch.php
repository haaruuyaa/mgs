<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\Helper;

/**
 * HelperSearch represents the model behind the search form about `app\master\models\Helper`.
 */
class HelperSearch extends Helper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['helperid', 'helpername', 'helperphone'], 'safe'],
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
        $query = Helper::find();

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
        $query->andFilterWhere(['like', 'helperid', $this->helperid])
            ->andFilterWhere(['like', 'helpername', $this->helpername])
            ->andFilterWhere(['like', 'helperphone', $this->helperphone]);

        return $dataProvider;
    }
}
