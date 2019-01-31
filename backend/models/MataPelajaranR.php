<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_pelajaran_r".
 *
 * @property int $id
 * @property string $pelajaran
 */
class MataPelajaranR extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_pelajaran_r';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelajaran'], 'required'],
            [['pelajaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pelajaran' => 'Pelajaran',
        ];
    }
}
