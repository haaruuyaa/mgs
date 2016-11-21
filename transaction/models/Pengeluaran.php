<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "pengeluaran".
 *
 * @property string $PengeluaranId
 * @property string $SetoranIdH
 * @property string $Amount
 * @property string $Description
 * @property string $DateCrt
 */
class Pengeluaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranId'], 'required'],
            [['Amount'], 'number'],
            [['DateCrt'], 'safe'],
            [['PengeluaranId', 'SetoranIdH'], 'string', 'max' => 10],
            [['Description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PengeluaranId' => 'Pengeluaran ID',
            'SetoranIdH' => 'Setoran Id H',
            'Amount' => 'Amount',
            'Description' => 'Description',
            'DateCrt' => 'Date Crt',
        ];
    }
}
