<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "pengeluaranpribadi".
 *
 * @property string $PengeluaranId
 * @property string $Description
 * @property string $Amount
 * @property string $Date
 * @property string $DateCrt
 */
class PengeluaranPribadi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengeluaranpribadi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PengeluaranId'], 'required'],
            [['Amount'], 'number'],
            [['Date', 'DateCrt'], 'safe'],
            [['PengeluaranId'], 'string', 'max' => 10],
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
            'Description' => 'Description',
            'Amount' => 'Amount',
            'Date' => 'Date',
            'DateCrt' => 'Date Crt',
        ];
    }
}
