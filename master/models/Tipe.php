<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "tipe".
 *
 * @property integer $tipeid
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
            [['isactive'], 'boolean'],
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
            'tipename' => 'Tipename',
            'isactive' => 'Isactive',
        ];
    }
}
