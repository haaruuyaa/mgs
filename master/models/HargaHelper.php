<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "hargahelper".
 *
 * @property integer $HHID
 * @property string $HelperId
 * @property string $JenisId
 * @property string $Price
 */
class HargaHelper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $HelperName;
    public $JenisName;
    
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
            [['Price'], 'number'],
            [['HelperId', 'JenisId'], 'string', 'max' => 10],
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
            'JenisId' => 'Jenis ID',
            'Price' => 'Price',
        ];
    }
}
