<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assign_guru".
 *
 * @property int $id
 * @property int $kelas_mata_pelajaran_id
 * @property int $guru_id
 *
 * @property KelasMataPelajaran $kelasMataPelajaran
 * @property Guru $guru
 */
class AssignGuru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_guru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_mata_pelajaran_id', 'guru_id'], 'required'],
            [['kelas_mata_pelajaran_id', 'guru_id'], 'integer'],
            [['kelas_mata_pelajaran_id'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMataPelajaran::className(), 'targetAttribute' => ['kelas_mata_pelajaran_id' => 'id']],
            [['guru_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guru::className(), 'targetAttribute' => ['guru_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_mata_pelajaran_id' => 'Kelas Mata Pelajaran ID',
            'guru_id' => 'Guru',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMataPelajaran()
    {
        return $this->hasOne(KelasMataPelajaran::className(), ['id' => 'kelas_mata_pelajaran_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuru()
    {
        return $this->hasOne(Guru::className(), ['id' => 'guru_id']);
    }
}
