<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "setorand".
 *
 * @property string $SetoranIdD
 * @property string $SetoranIdH
 * @property string $JenisId
 * @property integer $HHID
 * @property integer $Qty
 * @property string $DateCrt
 */
class SetoranD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $JenisName;
    public $Price;
    public $CustomerName;
    public static function tableName()
    {
        return 'setorand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['SetoranIdD'], 'required'],
           [['HHID', 'Qty'], 'integer'],
           [['HHID', 'HCID', 'Qty'], 'integer'],
           [['DateCrt'], 'safe'],
           [['SetoranIdD', 'SetoranIdH', 'JenisId'], 'string', 'max' => 10],
           [['SetoranIdD', 'SetoranIdH', 'JenisId', 'CustomerId'], 'string', 'max' => 10],
       ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'SetoranIdD' => 'Setoran Id D',
           'SetoranIdH' => 'Setoran Id H',
           'JenisId' => 'Jenis ID',
           'CustomerId' => 'Customer ID', 
           'HHID' => 'Hhid',
           'HCID' => 'Hcid', 
           'Qty' => 'Qty',
           'DateCrt' => 'Date Crt',
        ];
    }
}
