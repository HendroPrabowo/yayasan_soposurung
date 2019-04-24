<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru_mata_pelajaran_kelas".
 *
 * @property int $id
 * @property int $guru_tahun_ajaran_id
 * @property int $mata_pelajaran_id
 * @property int $kelas_id
 *
 * @property GuruTahunAjaran $guruTahunAjaran
 * @property KelasR $kelas
 * @property MataPelajaranR $mataPelajaran
 */
class GuruMataPelajaranKelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru_mata_pelajaran_kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guru_tahun_ajaran_id', 'mata_pelajaran_id', 'kelas_id'], 'required'],
            [['guru_tahun_ajaran_id', 'mata_pelajaran_id', 'kelas_id'], 'integer'],
            [['guru_tahun_ajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => GuruTahunAjaran::className(), 'targetAttribute' => ['guru_tahun_ajaran_id' => 'id']],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasR::className(), 'targetAttribute' => ['kelas_id' => 'id']],
            [['mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MataPelajaranR::className(), 'targetAttribute' => ['mata_pelajaran_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guru_tahun_ajaran_id' => 'Guru Tahun Ajaran ID',
            'mata_pelajaran_id' => 'Mata Pelajaran ID',
            'kelas_id' => 'Kelas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuruTahunAjaran()
    {
        return $this->hasOne(GuruTahunAjaran::className(), ['id' => 'guru_tahun_ajaran_id']);
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
}
