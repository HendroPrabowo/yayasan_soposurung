<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas_mata_pelajaran".
 *
 * @property int $id
 * @property int $tahun_ajaran_kelas_id
 * @property int $mata_pelajaran_id
 *
 * @property MataPelajaranR $mataPelajaran
 * @property TahunAjaranKelas $tahunAjaranKelas
 * @property Nilai[] $nilais
 */
class KelasMataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas_mata_pelajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_ajaran_kelas_id', 'mata_pelajaran_id'], 'required'],
            [['tahun_ajaran_kelas_id', 'mata_pelajaran_id'], 'integer'],
            [['mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => MataPelajaranR::className(), 'targetAttribute' => ['mata_pelajaran_id' => 'id']],
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
            'mata_pelajaran_id' => 'Mata Pelajaran ID',
        ];
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
    public function getTahunAjaranKelas()
    {
        return $this->hasOne(TahunAjaranKelas::className(), ['id' => 'tahun_ajaran_kelas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilais()
    {
        return $this->hasMany(Nilai::className(), ['kelas_mata_pelajaran_id' => 'id']);
    }
}
