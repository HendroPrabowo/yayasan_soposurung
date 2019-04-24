<?php

namespace app\models;

use yii\base\Model;

class SiswaAssign extends Model{
    public $nisn;

    public function rules()
    {
        return [
            ['nisn', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nisn' => 'NISN',
        ];
    }
}