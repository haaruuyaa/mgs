<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "orderan".
 *
 * @property string $orderid
 * @property string $tipeid
 * @property string $customerid
 * @property integer $qty
 * @property string $orderdate
 * @property string $dateadd
 * @property string $dateupdate
 */
class Orderan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid'], 'required'],
            [['qty'], 'integer'],
            [['orderdate', 'dateadd', 'dateupdate'], 'safe'],
            [['orderid', 'customerid'], 'string', 'max' => 10],
            [['tipeid'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderid' => 'Orderid',
            'tipeid' => 'Tipeid',
            'customerid' => 'Customerid',
            'qty' => 'Qty',
            'orderdate' => 'Orderdate',
            'dateadd' => 'Dateadd',
            'dateupdate' => 'Dateupdate',
        ];
    }
}
