<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "pengeluaranh".
 *
 * @property integer $PengeluaranIdH
 * @property string $SetoranIdH
 * @property string $Date
 * @property string $DateCrt
 */
class PengeluaranH extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluaranh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranIdH'], 'required'],
            [['Date', 'DateCrt'], 'safe'],
            [['PengeluaranIdH', 'SetoranIdH'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PengeluaranIdH' => 'Pengeluaran Id H',
            'SetoranIdH' => 'Setoran Id H',
            'Date' => 'Date',
            'DateCrt' => 'Date Crt',
        ];
    }
}
