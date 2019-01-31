<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_r".
 *
 * @property int $id
 * @property string $kelas
 *
 * @property Siswa[] $siswas
 */
class KelasR extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_r';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas'], 'required'],
            [['kelas'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas' => 'Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(Siswa::className(), ['kelas_id' => 'id']);
    }
}
