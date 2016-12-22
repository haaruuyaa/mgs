<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "hargacustomer".
 *
 * @property integer $HCID
 * @property integer $SeqId
 * @property string $CustomerId
 * @property string $Periode
 * @property string $JenisId
 * @property string $Price
 */
class HargaCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $CustomerName;
    public $JenisName;
    
    public static function tableName()
    {
        return 'hargacustomer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SeqId'], 'integer'],
            [['Periode'], 'safe'],
            [['Price'], 'number'],
            [['CustomerId', 'JenisId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HCID' => 'Hcid',
            'SeqId' => 'Seq ID',
            'CustomerId' => 'Customer ID',
            'Periode' => 'Periode',
            'JenisId' => 'Jenis ID',
            'Price' => 'Price',
        ];
    }
}
