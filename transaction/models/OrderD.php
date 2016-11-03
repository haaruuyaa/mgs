<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "orderd".
 *
 * @property string $OrderIdD
 * @property string $OrderIdH
 * @property string $CustomerId
 * @property string $JenisId
 * @property string $IDHC
 * @property integer $Qty
 * @property string $DateCrt
 * @property string $DateUpdate
 */
class OrderD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderIdD'], 'required'],
            [['Qty'], 'integer'],
            [['DateCrt', 'DateUpdate'], 'safe'],
            [['OrderIdD', 'OrderIdH', 'CustomerId', 'JenisId', 'IDHC'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OrderIdD' => 'Order Id D',
            'OrderIdH' => 'Order Id H',
            'CustomerId' => 'Customer ID',
            'JenisId' => 'Jenis ID',
            'IDHC' => 'Idhc',
            'Qty' => 'Qty',
            'DateCrt' => 'Date Crt',
            'DateUpdate' => 'Date Update',
        ];
    }
}