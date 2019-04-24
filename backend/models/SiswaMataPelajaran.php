<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa_mata_pelajaran".
 *
 * @property int $id
 * @property int $siswa_tahun_ajaran_id
 * @property int $mata_pelajaran_id
 * @property int $kelas_id
 *
 * @property KelasR $kelas
 * @property MataPelajaranR $mataPelajaran
 * @property SiswaTahunAjaran $siswaTahunAjaran
 */
class SiswaMataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa_mata_pelajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siswa_tahun_ajaran_id', 'mata_pelajaran_id', 'kelas_id'], 'required'],
            [['siswa_tahun_ajaran_id', 'mata_pelajaran_id', 'kelas_id'], 'integer'],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasR::className(), 'targetAttribute' => ['kelas_id' => 'id']],
            [['mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MataPelajaranR::className(), 'targetAttribute' => ['mata_pelajaran_id' => 'id']],
            [['siswa_tahun_ajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => SiswaTahunAjaran::className(), 'targetAttribute' => ['siswa_tahun_ajaran_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siswa_tahun_ajaran_id' => 'Siswa Tahun Ajaran ID',
            'mata_pelajaran_id' => 'Mata Pelajaran ID',
            'kelas_id' => 'Kelas ID',
        ];
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
    public function getMataPelajaran()
    {
        return $this->hasOne(MataPelajaranR::className(), ['id' => 'mata_pelajaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaTahunAjaran()
    {
        return $this->hasOne(SiswaTahunAjaran::className(), ['id' => 'siswa_tahun_ajaran_id']);
    }
}
