<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apl_sore".
 *
 * @property int $id
 * @property int $tahun_ajaran_kelas_id
 * @property int $jumlah
 * @property int $hadir
 * @property int $tidak_hadir
 * @property string $keterangan_tidak_hadir
 * @property int $jurnal_laporan_id
 *
 * @property JurnalLaporanPiket $jurnalLaporan
 * @property TahunAjaranKelas $tahunAjaranKelas
 */
class AplSore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apl_sore';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_ajaran_kelas_id', 'jumlah', 'hadir', 'tidak_hadir', 'jurnal_laporan_id'], 'required'],
            [['tahun_ajaran_kelas_id', 'jumlah', 'hadir', 'tidak_hadir', 'jurnal_laporan_id'], 'integer'],
            [['keterangan_tidak_hadir'], 'string'],
            [['jurnal_laporan_id'], 'exist', 'skipOnError' => true, 'targetClass' => JurnalLaporanPiket::className(), 'targetAttribute' => ['jurnal_laporan_id' => 'id']],
            [['tahun_ajaran_kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaranKelas::className(), 'targetAttribute' => ['tahun_ajaran_kelas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun_ajaran_kelas_id' => 'Tahun Ajaran Kelas ID',
            'jumlah' => 'Jumlah',
            'hadir' => 'Hadir',
            'tidak_hadir' => 'Tidak Hadir',
            'keterangan_tidak_hadir' => 'Keterangan Tidak Hadir',
            'jurnal_laporan_id' => 'Jurnal Laporan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurnalLaporan()
    {
        return $this->hasOne(JurnalLaporanPiket::className(), ['id' => 'jurnal_laporan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranKelas()
    {
        return $this->hasOne(TahunAjaranKelas::className(), ['id' => 'tahun_ajaran_kelas_id']);
    }
}
