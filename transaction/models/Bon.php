<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "bon".
 *
 * @property string $BonId
 * @property string $Description
 * @property string $Amount
 * @property string $Date
 * @property string $Tipe
 * @property string $DatePaid
 * @property string $DateCrt
 */
class Bon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BonId'], 'required'],
            [['Amount'], 'number'],
            [['Date', 'DatePaid', 'DateCrt'], 'safe'],
            [['BonId', 'Tipe'], 'string', 'max' => 10],
            [['Description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BonId' => 'Bon ID',
            'Description' => 'Description',
            'Amount' => 'Amount',
            'Date' => 'Date',
            'Tipe' => 'Tipe',
            'DatePaid' => 'Date Paid',
            'DateCrt' => 'Date Crt',
        ];
    }
}
