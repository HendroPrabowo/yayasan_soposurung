<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AccountType $accountType
 * @property AuthAssignment $authAssignment
 * @property Siswa $siswa
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['role', 'string'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'account_type_id' => 'Account Type ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Jenis Akun'
        ];
    }

    /**
     * Get Role
     */
    public function getAuthAssignment(){
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * Get Siswa
     */
    public function getSiswa(){
        return $this->hasOne(Siswa::className(), ['user_id' => 'id']);
    }
}
