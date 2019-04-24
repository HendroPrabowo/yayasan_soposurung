<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa_tahun_ajaran".
 *
 * @property int $id
 * @property string $nisn_siswa
 * @property int $tahun_ajaran_semester_id
 *
 * @property SiswaMataPelajaran[] $siswaMataPelajarans
 * @property Siswa $nisnSiswa
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class SiswaTahunAjaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa_tahun_ajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn_siswa', 'tahun_ajaran_semester_id'], 'required'],
            [['tahun_ajaran_semester_id'], 'integer'],
            [['nisn_siswa'], 'string', 'max' => 255],
            [['nisn_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['nisn_siswa' => 'nisn']],
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
            'nisn_siswa' => 'Nisn Siswa',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaMataPelajarans()
    {
        return $this->hasMany(SiswaMataPelajaran::className(), ['siswa_tahun_ajaran_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNisnSiswa()
    {
        return $this->hasOne(Siswa::className(), ['nisn' => 'nisn_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }
}
