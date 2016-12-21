<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masterstock".
 *
 * @property integer $StockId
 * @property string $JenisId
 * @property integer $StockIsi
 * @property integer $StockKosong
 * @property integer $StockTotal
 * @property string $StockDateAdd
 * @property string $DateCrt
 * @property string $DateUpdate
 */
class MasterStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $JenisName;

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
            [['StockIsi', 'StockKosong', 'StockTotal'], 'integer'],
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
            'StockTotal' => 'Stock Total',
            'StockDateAdd' => 'Stock Date Add',
            'DateCrt' => 'Date Crt',
            'DateUpdate' => 'Date Update',
        ];
    }
}
