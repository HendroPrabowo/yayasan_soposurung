<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id
 * @property int $kelas_siswa_id
 * @property int $komponen_nilai_id
 * @property int $nilai
 *
 * @property KelasSiswa $kelasSiswa
 * @property KomponenNilai $komponenNilai
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_siswa_id', 'komponen_nilai_id', 'nilai'], 'required'],
            [['kelas_siswa_id', 'komponen_nilai_id', 'nilai'], 'integer'],
            [['kelas_siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasSiswa::className(), 'targetAttribute' => ['kelas_siswa_id' => 'id']],
            [['komponen_nilai_id'], 'exist', 'skipOnError' => true, 'targetClass' => KomponenNilai::className(), 'targetAttribute' => ['komponen_nilai_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_siswa_id' => 'Kelas Siswa ID',
            'komponen_nilai_id' => 'Komponen Nilai ID',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasSiswa()
    {
        return $this->hasOne(KelasSiswa::className(), ['id' => 'kelas_siswa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomponenNilai()
    {
        return $this->hasOne(KomponenNilai::className(), ['id' => 'komponen_nilai_id']);
    }
}
