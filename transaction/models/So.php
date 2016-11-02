<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "so".
 *
 * @property string $SOID
 * @property string $SODate
 * @property string $JenisId
 * @property string $HelperId
 * @property integer $Qty
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
            [['SOID'], 'required'],
            [['SODate', 'datecrt'], 'safe'],
            [['Qty'], 'integer'],
            [['SOID', 'JenisId', 'HelperId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SOID' => 'Soid',
            'SODate' => 'Sodate',
            'JenisId' => 'Jenis ID',
            'HelperId' => 'Helper ID',
            'Qty' => 'Qty',
            'datecrt' => 'Datecrt',
        ];
    }
}
