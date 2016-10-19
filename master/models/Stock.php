<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $stockid
 * @property string $stockname
 * @property integer $stocktype
 * @property integer $stockqty
 * @property string $stockdateadd
 * @property string $datecrt
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['stocktype', 'stockqty'], 'integer'],
            [['stockdateadd', 'datecrt'], 'safe'],
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
            'stocktype' => 'Stocktype',
            'stockqty' => 'Stockqty',
            'stockdateadd' => 'Stockdateadd',
            'datecrt' => 'Datecrt',
        ];
    }
}
