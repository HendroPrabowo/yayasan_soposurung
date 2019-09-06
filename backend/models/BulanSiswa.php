<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bulan_siswa".
 *
 * @property int $id
 * @property string $jumlah_disetor
 * @property string $kode_briva
 * @property string $siswa_id
 * @property string $tanggal
 * @property int $lunas
 * @property int $bulan_angkatan_id
 *
 * @property BulanAngkatan $bulanAngkatan
 * @property Siswa $siswa
 */
class BulanSiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bulan_siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siswa_id', 'bulan_angkatan_id'], 'required'],
            [['tanggal'], 'safe'],
            [['lunas', 'bulan_angkatan_id'], 'integer'],
            [['jumlah_disetor', 'kode_briva', 'siswa_id'], 'string', 'max' => 255],
            [['bulan_angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => BulanAngkatan::className(), 'targetAttribute' => ['bulan_angkatan_id' => 'id']],
            [['siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_id' => 'nisn']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jumlah_disetor' => 'Jumlah Disetor',
            'kode_briva' => 'Kode Briva',
            'siswa_id' => 'Siswa ID',
            'tanggal' => 'Tanggal',
            'lunas' => 'Lunas',
            'bulan_angkatan_id' => 'Bulan Angkatan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBulanAngkatan()
    {
        return $this->hasOne(BulanAngkatan::className(), ['id' => 'bulan_angkatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(Siswa::className(), ['nisn' => 'siswa_id']);
    }
}
