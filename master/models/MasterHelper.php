<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masterhelper".
 *
 * @property string $HelperId
 * @property string $HelperName
 * @property string $HelperPhone
 */
class MasterHelper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterhelper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HelperId'], 'required'],
            [['HelperId'], 'string', 'max' => 10],
            [['HelperName', 'HelperPhone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HelperId' => 'Helper ID',
            'HelperName' => 'Helper Name',
            'HelperPhone' => 'Helper Phone',
        ];
    }
}
