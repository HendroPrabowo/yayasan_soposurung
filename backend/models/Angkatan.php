<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "angkatan".
 *
 * @property int $id
 * @property string $angkatan
 */
class Angkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['angkatan'], 'required'],
            [['angkatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'angkatan' => 'Angkatan',
        ];
    }
}
