<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "masterjenis".
 *
 * @property string $JenisId
 * @property string $JenisName
 */
class MasterJenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterjenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JenisId'], 'required'],
            [['JenisId', 'JenisName'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JenisId' => 'Jenis ID',
            'JenisName' => 'Jenis Name',
        ];
    }
}
