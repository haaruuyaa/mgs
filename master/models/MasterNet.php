<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masternet".
 *
 * @property integer $Id
 * @property integer $SeqId
 * @property string $JenisId
 * @property string $Price
 * @property string $DateCrt
 */
class MasterNet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masternet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SeqId'], 'integer'],
            [['Price'], 'number'],
            [['DateCrt'], 'safe'],
            [['JenisId'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'SeqId' => 'Seq ID',
            'JenisId' => 'Jenis ID',
            'Price' => 'Price',
            'DateCrt' => 'Date Crt',
        ];
    }
}
