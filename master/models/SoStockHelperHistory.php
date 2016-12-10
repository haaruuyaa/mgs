<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "sostockhelperhistory".
 *
 * @property string $StockHelpId
 * @property string $HelperId
 * @property string $JenisId
 * @property integer $Isi
 * @property string $DateAdd
 * @property string $DateCrt
 */
class SoStockHelperHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sostockhelperhistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockHelpId'], 'required'],
            [['Isi'], 'integer'],
            [['DateAdd', 'DateCrt'], 'safe'],
            [['StockHelpId'], 'string', 'max' => 10],
            [['HelperId', 'JenisId'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StockHelpId' => 'Stock Help ID',
            'HelperId' => 'Helper ID',
            'JenisId' => 'Jenis ID',
            'Isi' => 'Isi',
            'DateAdd' => 'Date Add',
            'DateCrt' => 'Date Crt',
        ];
    }
}
