<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apl_mkn_siang".
 *
 * @property int $id
 * @property string $kelas
 * @property int $jumlah
 * @property int $hadir
 * @property int $tidak_hadir
 * @property string $keterangan_tidak_hadir
 * @property int $jurnal_laporan_id
 *
 * @property JurnalLaporanPiket $jurnalLaporan
 */
class AplMknSiang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apl_mkn_siang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas', 'jumlah', 'hadir', 'jurnal_laporan_id', 'tidak_hadir'], 'required'],
            [['jumlah', 'hadir', 'jurnal_laporan_id', 'tidak_hadir'], 'integer'],
            [['keterangan_tidak_hadir'], 'string'],
            [['kelas'], 'string', 'max' => 255],
            [['jurnal_laporan_id'], 'exist', 'skipOnError' => true, 'targetClass' => JurnalLaporanPiket::className(), 'targetAttribute' => ['jurnal_laporan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas' => 'Kelas',
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
}
