<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\HargaHelper;

/**
 * HargaHelperSearch represents the model behind the search form about `app\master\models\HargaHelper`.
 */
class HargaHelperSearch extends HargaHelper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HHID', 'HelperId','JenisId'], 'safe'],
            [['Price'], 'number'],
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
        $query = HargaHelper::find()
                ->select("*")
                ->from("HargaHelper hh")
                ->leftJoin("MasterHelper mh",'mh.HelperId = hh.HelperId')
                ->leftJoin('MasterJenis mj','mj.JenisId = hh.JenisId')
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
            'Price' => $this->Price,
        ]);

        $query->andFilterWhere(['like', 'HHID', $this->HHID])
            ->andFilterWhere(['like', 'HelperName', $this->HelperId])
            ->andFilterWhere(['like', 'JenisName', $this->JenisId]);

        return $dataProvider;
    }
}
