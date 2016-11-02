<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "setorand".
 *
 * @property string $SetoranIdD
 * @property string $SetoranIdH
 * @property string $JenisId
 * @property string $HHID
 * @property integer $Qty
 * @property string $DateCrt
 */
class SetoranD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['Qty'], 'integer'],
            [['DateCrt'], 'safe'],
            [['SetoranIdD', 'SetoranIdH', 'JenisId', 'HHID'], 'string', 'max' => 10],
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
            'HHID' => 'Hhid',
            'Qty' => 'Qty',
            'DateCrt' => 'Date Crt',
        ];
    }
}
