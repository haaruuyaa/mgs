<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "tipe".
 *
 * @property string $tipeid
 * @property string $status
 * @property string $tipename
 * @property boolean $isactive
 */
class Tipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipeid', 'status'], 'required'],
            [['isactive'], 'boolean'],
            [['tipeid', 'status'], 'string', 'max' => 10],
            [['tipename'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipeid' => 'Tipeid',
            'status' => 'Status',
            'tipename' => 'Tipename',
            'isactive' => 'Isactive',
        ];
    }
}
