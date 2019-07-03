<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apl_mkn_malam".
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
class AplMknMalam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apl_mkn_malam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas', 'jumlah', 'hadir', 'tidak_hadir', 'jurnal_laporan_id'], 'required'],
            [['jumlah', 'hadir', 'tidak_hadir', 'jurnal_laporan_id'], 'integer'],
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
