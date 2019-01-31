<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property string $nisn
 * @property string $nama
 * @property string $kelahiran
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string $status_dalam_keluarga
 * @property int $anak_ke
 * @property string $sekolah_asal
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $alamat_orang_tua
 * @property int $nomor_telepon_orang_tua
 * @property string $pekerjaan_ayah
 * @property string $pekerjaan_ibu
 * @property int $user_id
 * @property int $kelas_id
 *
 * @property User $user
 * @property KelasR $kelas
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn', 'user_id'], 'required'],
            [['anak_ke', 'nomor_telepon_orang_tua', 'user_id', 'kelas_id'], 'integer'],
            [['alamat_orang_tua'], 'string'],
            [['nisn', 'kelahiran', 'jenis_kelamin', 'agama', 'status_dalam_keluarga', 'pekerjaan_ayah', 'pekerjaan_ibu'], 'string', 'max' => 255],
            [['nama', 'nama_ayah', 'nama_ibu'], 'string', 'max' => 500],
            [['sekolah_asal'], 'string', 'max' => 300],
            [['nisn'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nisn' => 'Nisn',
            'nama' => 'Nama',
            'kelahiran' => 'Kelahiran',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'status_dalam_keluarga' => 'Status Dalam Keluarga',
            'anak_ke' => 'Anak Ke',
            'sekolah_asal' => 'Sekolah Asal',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'alamat_orang_tua' => 'Alamat Orang Tua',
            'nomor_telepon_orang_tua' => 'Nomor Telepon Orang Tua',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'user_id' => 'User ID',
            'kelas_id' => 'Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Mengambil nama kelas
     */
    public function getKelas(){
        return $this->hasOne(KelasR::className(), ['id' => 'kelas_id']);
    }
}
