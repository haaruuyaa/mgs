<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "memberdetail".
 *
 * @property integer $MemberIdD
 * @property integer $MemberId
 * @property string $Date
 * @property string $JenisId
 * @property integer $Qty
 * @property string $DateCrt
 */
class MemberDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MemberIdD'], 'required'],
            [['MemberIdD', 'MemberId', 'Qty'], 'integer'],
            [['Date', 'DateCrt'], 'safe'],
            [['JenisId'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MemberIdD' => 'Member Id D',
            'MemberId' => 'Member ID',
            'Date' => 'Date',
            'JenisId' => 'Jenis ID',
            'Qty' => 'Qty',
            'DateCrt' => 'Date Crt',
        ];
    }
}
