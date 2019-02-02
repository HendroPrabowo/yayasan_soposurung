<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property int $id
 * @property string $no_induk_guru
 * @property string $username
 * @property string $nama
 * @property int $user_id
 *
 * @property User $user
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_induk_guru', 'username', 'nama'], 'required'],
            ['username', 'validateGuru'],
            [['user_id'], 'integer'],
            [['no_induk_guru', 'username', 'nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_induk_guru' => 'No Induk Guru',
            'username' => 'Username',
            'nama' => 'Nama',
            'user_id' => 'User ID',
        ];
    }

    /*
     * Validation
     */
    public function validateGuru($attribute, $params, $validator)
    {
        $user = Guru::find()->where(['username' => $this->username])->one();
        if($user != null){
            $this->addError($attribute, 'Username sudah ada');
        }
    }

    /**
     * Get user type
     */
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
