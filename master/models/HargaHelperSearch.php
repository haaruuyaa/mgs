<?php

namespace app\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\master\models\HargaHelper;
use app\transaction\models\SetoranH;

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
            'pagination' => [
                'pageSize' => 10,
            ]
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

    public function GetHarga($Help,$Jen,$sth)
    {
        $query = HargaHelper::find()->where(['HelperId' => $Help,'JenisId' => $Jen])->all();
        $dateSetoran = SetoranH::findOne($sth);
        $tglsth = $dateSetoran['Date'];

        if(count($query) > 1)
        {
          $query1 = HargaHelper::find()->where(['HelperId' => $Help,'JenisId' => $Jen])->orderBy('SeqId DESC')->one();
          $dateperiod = $query1['Periode'];
          $seqid = $query1['SeqId'];

          $datep = strtotime($dateperiod);
          $dates = strtotime($tglsth);
          $datediff = $dates - $datep;

          if($datediff >= 0)
          {
            $queryhh = HargaHelper::find()->where(['HelperId' => $Help,'JenisId' => $Jen])->orderBy('SeqId DESC')->one();

          } else {
            $queryhh = HargaHelper::find()->where(['HelperId' => $Help,'JenisId' => $Jen,'SeqId' => ($seqid-1)])->orderBy('SeqId DESC')->one();

          }

        } else {
          $queryhh = HargaHelper::find()->where(['HelperId' => $Help,'JenisId' => $Jen])->one();
        }
        return $queryhh;

    }
}
