<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "hargacustomer".
 *
 * @property string $HCID
 * @property string $CustomerId
 * @property string $Price
 */
class HargaCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hargacustomer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HCID'], 'required'],
            [['Price'], 'number'],
            [['HCID', 'CustomerId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HCID' => 'Hcid',
            'CustomerId' => 'Customer ID',
            'Price' => 'Price',
        ];
    }
}
