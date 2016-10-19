<?php

namespace app\master\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $groupid
 * @property integer $role_id
 * @property integer $status
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'role_id', 'status'], 'required'],
            [['id', 'role_id', 'status'], 'integer'],
            [['username', 'email', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['groupid'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'groupid' => 'Groupid',
            'role_id' => 'Role ID',
            'status' => 'Status',
            'email' => 'Email',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }
}
