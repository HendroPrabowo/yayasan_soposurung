<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_wali".
 *
 * @property int $id
 * @property string $akademik
 * @property string $prestasi
 * @property string $absensi
 * @property string $catatan
 * @property string $fisik
 * @property string $organisasi
 * @property string $administrasi
 * @property int $semester_angkatan_id
 * @property string $siswa_id
 *
 * @property Siswa $siswa
 * @property SemesterAngkatan $semesterAngkatan
 */
class LaporanWali extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_wali';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['akademik', 'prestasi', 'absensi', 'catatan', 'fisik', 'organisasi', 'administrasi'], 'string'],
            [['semester_angkatan_id', 'siswa_id'], 'required'],
            [['semester_angkatan_id'], 'integer'],
            [['siswa_id'], 'string', 'max' => 255],
            [['siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_id' => 'nisn']],
            [['semester_angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => SemesterAngkatan::className(), 'targetAttribute' => ['semester_angkatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'akademik' => 'Akademik',
            'prestasi' => 'Prestasi',
            'absensi' => 'Absensi',
            'catatan' => 'Catatan dari Konselor & Wali Angkatan',
            'fisik' => 'Fisik',
            'organisasi' => 'Organisasi',
            'administrasi' => 'Administrasi',
            'semester_angkatan_id' => 'Semester Angkatan ID',
            'siswa_id' => 'Siswa ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(Siswa::className(), ['nisn' => 'siswa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterAngkatan()
    {
        return $this->hasOne(SemesterAngkatan::className(), ['id' => 'semester_angkatan_id']);
    }
}
