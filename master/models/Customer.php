<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $customerid
 * @property string $customername
 * @property string $customerphone
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerid'], 'required'],
            [['customerid'], 'string', 'max' => 10],
            [['customername', 'customerphone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerid' => 'Customerid',
            'customername' => 'Customername',
            'customerphone' => 'Customerphone',
        ];
    }
}
