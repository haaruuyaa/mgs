<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "so".
 *
 * @property string $soid
 * @property string $sodate
 * @property integer $tipeid
 * @property integer $qty
 * @property string $user
 * @property string $usercrt
 * @property string $datecrt
 */
class So extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'so';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soid'], 'required'],
            [['sodate', 'datecrt'], 'safe'],
            [['tipeid', 'qty'], 'integer'],
            [['soid'], 'string', 'max' => 10],
            [['user', 'usercrt'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'soid' => 'Soid',
            'sodate' => 'Sodate',
            'tipeid' => 'Tipeid',
            'qty' => 'Qty',
            'user' => 'User',
            'usercrt' => 'Usercrt',
            'datecrt' => 'Datecrt',
        ];
    }
}
