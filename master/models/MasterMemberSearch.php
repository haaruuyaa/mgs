<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\MasterMember;
use app\master\models\MemberDetail;
/**
 * MasterMemberSearch represents the model behind the search form about `app\master\models\MasterMember`.
 */
class MasterMemberSearch extends MasterMember
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MemberId', 'MemberAddress', 'DateCrt'], 'safe'],
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
        $query = MasterMember::find();

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
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'MemberId', $this->MemberId])
            ->andFilterWhere(['like', 'MemberAddress', $this->MemberAddress]);

        return $dataProvider;
    }

    public function searchDetail($params)
    {
        $query = MemberDetail::find()
        ->select('*')
        ->from("MemberDetail md")
        ->leftJoin('MasterJenis mj','mj.JenisId = md.JenisId')
        ->where(['MemberId' => $params])
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
            'DateCrt' => $this->DateCrt,
        ]);

        $query->andFilterWhere(['like', 'MemberId', $this->MemberId]);

        return $dataProvider;
    }
}
