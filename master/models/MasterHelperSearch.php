<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\MasterHelper;

/**
 * MasterHelperSearch represents the model behind the search form about `app\master\models\MasterHelper`.
 */
class MasterHelperSearch extends MasterHelper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HelperId', 'HelperName', 'HelperPhone'], 'safe'],
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
        $query = MasterHelper::find();

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
        $query->andFilterWhere(['like', 'HelperId', $this->HelperId])
            ->andFilterWhere(['like', 'HelperName', $this->HelperName])
            ->andFilterWhere(['like', 'HelperPhone', $this->HelperPhone]);

        return $dataProvider;
    }
    
    public function GenerateId()
    {
        $query = Yii::$app->db->createCommand("
            SELECT
            CONCAT(
                    'A',
                    RIGHT(CONCAT('00',CONVERT(IFNULL(MAX(RIGHT(HelperId,3)),0)+1,CHAR)),3)
            ) AS HelperId 
            FROM MasterHelper
            ;")->queryScalar();
        
        return $query;
    }
}
