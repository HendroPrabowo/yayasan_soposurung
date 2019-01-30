<?php

namespace backend\models;

use yii\base\Model;

class Excel extends Model{
    public $excel;

    public function rules()
    {
        return [
            [['excel'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xls, xlsx'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'excel' => 'Upload Excel',
        ];
    }
}