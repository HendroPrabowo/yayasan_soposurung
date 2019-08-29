<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kesehatan".
 *
 * @property int $id
 * @property string $siswa_id
 * @property string $penyakit
 * @property string $keterangan
 * @property int $tahun_ajaran_semester_id
 * @property string $tanggal
 * @property string $created_by
 *
 * @property Siswa $siswa
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class Kesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siswa_id', 'penyakit', 'keterangan', 'tahun_ajaran_semester_id', 'tanggal'], 'required'],
            [['keterangan'], 'string'],
            [['tahun_ajaran_semester_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['siswa_id', 'penyakit', 'created_by'], 'string', 'max' => 255],
            [['siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_id' => 'nisn']],
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
            'siswa_id' => 'Siswa ID',
            'penyakit' => 'Penyakit',
            'keterangan' => 'Keterangan',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
            'tanggal' => 'Tanggal',
            'created_by' => 'Created By',
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
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }
}
