<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "mastercustomer".
 *
 * @property string $CustomerId
 * @property string $CustomerName
 * @property string $CustomerPhone
 */
class MasterCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mastercustomer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustomerId'], 'required'],
            [['CustomerId'], 'string', 'max' => 10],
            [['CustomerName', 'CustomerPhone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CustomerId' => 'Customer ID',
            'CustomerName' => 'Customer Name',
            'CustomerPhone' => 'Customer Phone',
        ];
    }
}
