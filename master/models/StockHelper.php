<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "stockhelper".
 *
 * @property string $StockHelpId
 * @property string $HelperId
 * @property string $JenisId
 * @property integer $Isi
 * @property integer $Kosong
 * @property string $DateAdd
 * @property string $DateUpdate
 * @property string $DateCrt
 */
class StockHelper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $JenisName;
    public static function tableName()
    {
        return 'stockhelper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockHelpId'], 'required'],
            [['Isi', 'Kosong'], 'integer'],
            [['DateAdd', 'DateUpdate', 'DateCrt'], 'safe'],
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
            'Kosong' => 'Kosong',
            'DateAdd' => 'Date Add',
            'DateUpdate' => 'Date Update',
            'DateCrt' => 'Date Crt',
        ];
    }
}
