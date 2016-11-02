<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "hargahelper".
 *
 * @property string $HHID
 * @property string $HelperId
 * @property string $Price
 */
class HargaHelper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hargahelper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HHID'], 'required'],
            [['Price'], 'number'],
            [['HHID', 'HelperId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HHID' => 'Hhid',
            'HelperId' => 'Helper ID',
            'Price' => 'Price',
        ];
    }
}
