<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "soh".
 *
 * @property string $SOIDH
 * @property string $SODate
 * @property string $DateCrt
 */
class Soh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOIDH'], 'required'],
            [['SODate', 'DateCrt'], 'safe'],
            [['SOIDH', 'SetoranIdH'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SOIDH' => 'Soidh',
            'SetoranIdH' => 'Setoran Id H', 
            'SODate' => 'Sodate',
            'DateCrt' => 'Date Crt',
        ];
    }
}
