<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "so".
 *
 * @property string $soid
 * @property string $sodate
 * @property string $tipeid
 * @property integer $qty
 * @property string $user
 * @property string $usercrt
 * @property string $datecrt
 * @property string $jenisid
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
            [['qty'], 'integer'],
            [['soid', 'tipeid', 'jenisid'], 'string', 'max' => 10],
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
            'jenisid' => 'Jenisid',
        ];
    }
}
