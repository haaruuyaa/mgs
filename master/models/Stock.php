<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property string $stockid
 * @property string $stockname
 * @property string $tipeid
 * @property integer $stockqty
 * @property string $stockdateadd
 * @property string $datecrt
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $type;
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stockid'], 'required'],
            [['stockqty'], 'integer'],
            [['stockdateadd', 'datecrt'], 'safe'],
            [['stockid', 'tipeid'], 'string', 'max' => 10],
            [['stockname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stockid' => 'Stockid',
            'stockname' => 'Stockname',
            'tipeid' => 'Tipeid',
            'stockqty' => 'Stockqty',
            'stockdateadd' => 'Stockdateadd',
            'datecrt' => 'Datecrt',
        ];
    }
}
