<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "helper".
 *
 * @property string $helperid
 * @property string $helpername
 * @property string $helperphone
 */
class Helper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'helper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['helperid'], 'required'],
            [['helperid'], 'string', 'max' => 10],
            [['helpername', 'helperphone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'helperid' => 'Helperid',
            'helpername' => 'Helpername',
            'helperphone' => 'Helperphone',
        ];
    }
}
