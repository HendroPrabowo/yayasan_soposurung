<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ChangePassword extends Model{
    public $password_lama;
    public $password_baru;
    public $password_konfirmasi;

    public function rules()
    {
        return [
            [['password_lama', 'password_baru', 'password_konfirmasi'], 'required'],
            [['password_baru', 'password_konfirmasi'],'string', 'min' => 5],
            ['password_konfirmasi', 'compare', 'compareAttribute' => 'password_baru', 'operator' => '==', 'message' => 'Password harus sama']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password_lama' => 'Password Lama',
            'password_baru' => 'Password Baru',
            'password_konfirmasi' => 'Konfirmasi Password Baru',
        ];
    }
}