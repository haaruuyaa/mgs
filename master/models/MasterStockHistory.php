<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masterstockhistory".
 *
 * @property integer $StockId
 * @property string $JenisId
 * @property integer $StockIsi
 * @property integer $StockKosong
 * @property string $StockDateAdd
 * @property string $DateCrt
 * @property string $DateUpdate
 */
class MasterStockHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterstockhistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockIsi', 'StockKosong'], 'integer'],
            [['StockDateAdd', 'DateCrt', 'DateUpdate'], 'safe'],
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
            'StockIsi' => 'Stock Isi',
            'StockKosong' => 'Stock Kosong',
            'StockDateAdd' => 'Stock Date Add',
            'DateCrt' => 'Date Crt',
            'DateUpdate' => 'Date Update',
        ];
    }
}
