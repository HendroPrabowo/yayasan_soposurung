<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "komponen_nilai".
 *
 * @property int $id
 * @property int $kelas_mata_pelajaran_id
 * @property string $komponen_nilai
 *
 * @property KelasMataPelajaran $kelasMataPelajaran
 */
class KomponenNilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'komponen_nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_mata_pelajaran_id', 'komponen_nilai'], 'required'],
            [['kelas_mata_pelajaran_id'], 'integer'],
            [['komponen_nilai'], 'string', 'max' => 255],
            [['kelas_mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMataPelajaran::className(), 'targetAttribute' => ['kelas_mata_pelajaran_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_mata_pelajaran_id' => 'Kelas Mata Pelajaran ID',
            'komponen_nilai' => 'Komponen Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMataPelajaran()
    {
        return $this->hasOne(KelasMataPelajaran::className(), ['id' => 'kelas_mata_pelajaran_id']);
    }
}
