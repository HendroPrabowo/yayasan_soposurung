<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kedisiplinan".
 *
 * @property int $id
 * @property string $siswa_id
 * @property int $tambah_ke_point
 * @property int $aturan_asrama_id
 * @property string $keterangan
 *
 * @property Siswa $siswa
 * @property AturanAsrama $aturanAsrama
 */
class Kedisiplinan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kedisiplinan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siswa_id', 'aturan_asrama_id', 'keterangan', 'tambah_ke_point', 'tanggal'], 'required'],
            [['aturan_asrama_id'], 'integer'],
            [['tambah_ke_point'], 'integer'],
            [['keterangan'], 'string'],
            [['tanggal'], 'safe'],
            [['siswa_id'], 'string', 'max' => 255],
            [['siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_id' => 'nisn']],
            [['aturan_asrama_id'], 'exist', 'skipOnError' => true, 'targetClass' => AturanAsrama::className(), 'targetAttribute' => ['aturan_asrama_id' => 'id']],
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
            'aturan_asrama_id' => 'Aturan Asrama ID',
            'keterangan' => 'Keterangan',
            'tanggal' => 'Tanggal',
            'tambah_ke_point' => 'Tambah Point'
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
    public function getAturanAsrama()
    {
        return $this->hasOne(AturanAsrama::className(), ['id' => 'aturan_asrama_id']);
    }
}
