<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "pendapatan".
 *
 * @property string $PendapatanId
 * @property string $SetoranIdH
 * @property string $Amount
 * @property string $Description
 * @property string $DateCrt
 */
class Pendapatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $Date;
    public static function tableName()
    {
        return 'pendapatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PendapatanId'], 'required'],
            [['Amount'], 'number'],
            [['DateCrt'], 'safe'],
            [['PendapatanId', 'SetoranIdH'], 'string', 'max' => 10],
            [['Description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PendapatanId' => 'Pendapatan ID',
            'SetoranIdH' => 'Setoran Id H',
            'Amount' => 'Amount',
            'Description' => 'Description',
            'DateCrt' => 'Date Crt',
        ];
    }
}
