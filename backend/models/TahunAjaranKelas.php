<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tahun_ajaran_kelas".
 *
 * @property int $id
 * @property int $tahun_ajaran_semester_id
 * @property int $kelas_id
 *
 * @property KelasMataPelajaran[] $kelasMataPelajarans
 * @property KelasR $kelas
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class TahunAjaranKelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tahun_ajaran_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_ajaran_semester_id', 'kelas_id'], 'required'],
            [['tahun_ajaran_semester_id', 'kelas_id'], 'integer'],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasR::className(), 'targetAttribute' => ['kelas_id' => 'id']],
            [['tahun_ajaran_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaranSemester::className(), 'targetAttribute' => ['tahun_ajaran_semester_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
            'kelas_id' => 'Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMataPelajarans()
    {
        return $this->hasMany(KelasMataPelajaran::className(), ['tahun_ajaran_kelas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(KelasR::className(), ['id' => 'kelas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }

    /*
     * Hitung jumlah siswa
     */
    public function getJumlahSiswa(){
        $kelas_siswa = KelasSiswa::find()->where(['thn_ajaran_kelas_id' => $this->id])->all();
        return sizeof($kelas_siswa);
    }

    /*
     * Kelas Siswa
     */
    public function getKelasSiswa(){
        return $this->hasMany(KelasSiswa::className(), ['thn_ajaran_kelas_id' => 'id']);
    }
}
