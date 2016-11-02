<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masterstock".
 *
 * @property string $StockId
 * @property string $JenisId
 * @property integer $StockQty
 * @property string $StockDateAdd
 * @property string $DateCrt
 */
class MasterStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterstock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockId'], 'required'],
            [['StockQty'], 'integer'],
            [['StockDateAdd', 'DateCrt'], 'safe'],
            [['StockId'], 'string', 'max' => 10],
            [['JenisId'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StockId' => 'Stock ID',
            'JenisId' => 'Jenis ID',
            'StockQty' => 'Stock Qty',
            'StockDateAdd' => 'Stock Date Add',
            'DateCrt' => 'Date Crt',
        ];
    }
}
