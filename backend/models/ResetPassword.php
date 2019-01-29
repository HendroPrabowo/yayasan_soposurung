<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ResetPassword extends Model{
    // Atribut
    public $username;
    public $new_password;
    public $password_repeat;

    const WEAK = 0;
    const STRONG = 1;

    // Method
    public function rules()
    {
        return [
            ['new_password', 'required'],
            ['new_password', 'string', 'min' => 5],

            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function checkUsername($attribute, $param){
        $user = User::find()->where(['username' => $this->username])->one();
        if($user == null){
            $this->addError($attribute, 'Username tidak ada');
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'new_password' => 'Password Baru',
            'password_repeat' => 'Ulangi Password'
        ];
    }


}