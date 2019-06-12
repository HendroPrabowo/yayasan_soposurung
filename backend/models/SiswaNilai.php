<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa_nilai".
 *
 * @property int $id
 * @property int $kelas_siswa_id
 * @property int $kelas_mata_pelajaran_id
 *
 * @property KelasMataPelajaran $kelasMataPelajaran
 * @property KelasSiswa $kelasSiswa
 */
class SiswaNilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa_nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_siswa_id', 'kelas_mata_pelajaran_id'], 'required'],
            [['kelas_siswa_id', 'kelas_mata_pelajaran_id'], 'integer'],
            [['kelas_mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMataPelajaran::className(), 'targetAttribute' => ['kelas_mata_pelajaran_id' => 'id']],
            [['kelas_siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasSiswa::className(), 'targetAttribute' => ['kelas_siswa_id' => 'id']],
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
            'kelas_mata_pelajaran_id' => 'Kelas Mata Pelajaran ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMataPelajaran()
    {
        return $this->hasOne(KelasMataPelajaran::className(), ['id' => 'kelas_mata_pelajaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasSiswa()
    {
        return $this->hasOne(KelasSiswa::className(), ['id' => 'kelas_siswa_id']);
    }
}
