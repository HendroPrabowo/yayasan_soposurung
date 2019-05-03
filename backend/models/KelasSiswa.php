<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_siswa".
 *
 * @property int $id
 * @property string $nisn
 * @property int $thn_ajaran_kelas_id
 *
 * @property Siswa $nisn0
 * @property TahunAjaranKelas $thnAjaranKelas
 */
class KelasSiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn', 'thn_ajaran_kelas_id'], 'required'],
            [['thn_ajaran_kelas_id'], 'integer'],
            [['nisn'], 'string', 'max' => 255],
            [['nisn'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['nisn' => 'nisn']],
            [['thn_ajaran_kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaranKelas::className(), 'targetAttribute' => ['thn_ajaran_kelas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nisn' => 'Nisn',
            'thn_ajaran_kelas_id' => 'Thn Ajaran Kelas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNisn0()
    {
        return $this->hasOne(Siswa::className(), ['nisn' => 'nisn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThnAjaranKelas()
    {
        return $this->hasOne(TahunAjaranKelas::className(), ['id' => 'thn_ajaran_kelas_id']);
    }
}
