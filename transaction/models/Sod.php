<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "sod".
 *
 * @property string $SOIDD
 * @property string $SOIDH
 * @property string $JenisId
 * @property string $HelperId
 * @property integer $Qty
 * @property string $DateCrt
 */
class Sod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $JenisName;
    public $HelperName;
    
    public static function tableName()
    {
        return 'sod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOIDD'], 'required'],
            [['Qty'], 'integer'],
            [['DateCrt'], 'safe'],
            [['SOIDD', 'SOIDH', 'JenisId', 'HelperId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SOIDD' => 'Soidd',
            'SOIDH' => 'Soidh',
            'JenisId' => 'Jenis ID',
            'HelperId' => 'Helper ID',
            'Qty' => 'Qty',
            'DateCrt' => 'Date Crt',
        ];
    }
}