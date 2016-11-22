<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "setoranh".
 *
 * @property string $SetoranIdH
 * @property string $HelperId
 * @property string $Date
 * @property string $DateCrt
 */
class SetoranH extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $HelperName;
    public $PengeluaranIdH;
    public $SOIDH;
    public $Qty;
    public static function tableName()
    {
        return 'setoranh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SetoranIdH'], 'required'],
            [['Date', 'DateCrt'], 'safe'],
            [['SetoranIdH', 'HelperId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SetoranIdH' => 'Setoran Id H',
            'HelperId' => 'Helper ID',
            'Date' => 'Date',
            'DateCrt' => 'Date Crt',
        ];
    }
}
