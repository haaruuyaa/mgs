<?php

namespace app\transaction\models;

use Yii;

/**
 * This is the model class for table "setoran".
 *
 * @property string $setoranid
 * @property string $helperid
 * @property string $tipeid
 * @property string $jenisid
 * @property integer $qty
 * @property string $date
 * @property string $datecrt
 */
class Setoran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setoran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setoranid'], 'required'],
            [['qty'], 'integer'],
            [['date', 'datecrt'], 'safe'],
            [['setoranid', 'helperid', 'tipeid', 'jenisid'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setoranid' => 'Setoranid',
            'helperid' => 'Helperid',
            'tipeid' => 'Tipeid',
            'jenisid' => 'Jenisid',
            'qty' => 'Qty',
            'date' => 'Date',
            'datecrt' => 'Datecrt',
        ];
    }
}
