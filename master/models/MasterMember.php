<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "mastermember".
 *
 * @property integer $MemberId
 * @property string $MemberAddress
 * @property integer $CountBuy
 * @property string $DateCrt
 */
class MasterMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mastermember';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MemberAddress', 'DateCrt'], 'required'],
            [['DateCrt'], 'safe'],
            [['MemberAddress'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MemberId' => 'Member ID',
            'MemberAddress' => 'Member Address',
            'DateCrt' => 'Date Crt',
        ];
    }
}
