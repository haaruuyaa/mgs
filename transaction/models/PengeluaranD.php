<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "pengeluarand".
 *
 * @property string $PengeluaranIdD
 * @property string $PengeluaranIdH
 * @property string $Amount
 * @property string $Description
 * @property string $DateCrt
 */
class PengeluaranD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluarand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranIdD'], 'required'],
            [['Amount'], 'number'],
            [['DateCrt'], 'safe'],
            [['PengeluaranIdD', 'PengeluaranIdH'], 'string', 'max' => 10],
            [['Description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PengeluaranIdD' => 'Pengeluaran Id D',
            'PengeluaranIdH' => 'Pengeluaran Id H',
            'Amount' => 'Amount',
            'Description' => 'Description',
            'DateCrt' => 'Date Crt',
        ];
    }
}
