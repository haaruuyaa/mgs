<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "orderh".
 *
 * @property string $OrderIdH
 * @property string $OrderDate
 * @property string $DateCrt
 */
class OrderH extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderIdH'], 'required'],
            [['OrderDate', 'DateCrt'], 'safe'],
            [['OrderIdH'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OrderIdH' => 'Order Id H',
            'OrderDate' => 'Order Date',
            'DateCrt' => 'Date Crt',
        ];
    }
}
