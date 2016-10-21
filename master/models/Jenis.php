<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "jenis".
 *
 * @property string $jenisid
 * @property string $jenisname
 */
class Jenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenisid'], 'required'],
            [['jenisid', 'jenisname'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenisid' => 'Jenisid',
            'jenisname' => 'Jenisname',
        ];
    }
}
