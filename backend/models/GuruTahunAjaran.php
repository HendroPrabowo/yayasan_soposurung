<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru_tahun_ajaran".
 *
 * @property int $id
 * @property int $guru_id
 * @property int $tahun_ajaran_semester_id
 *
 * @property GuruMataPelajaranKelas[] $guruMataPelajaranKelas
 * @property Guru $guru
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class GuruTahunAjaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru_tahun_ajaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guru_id', 'tahun_ajaran_semester_id'], 'required'],
            [['guru_id', 'tahun_ajaran_semester_id'], 'integer'],
            [['guru_id'], 'exist', 'skipOnError' => true, 'targetClass' => Guru::className(), 'targetAttribute' => ['guru_id' => 'id']],
            [['tahun_ajaran_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaranSemester::className(), 'targetAttribute' => ['tahun_ajaran_semester_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guru_id' => 'Guru ID',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuruMataPelajaranKelas()
    {
        return $this->hasMany(GuruMataPelajaranKelas::className(), ['guru_tahun_ajaran_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuru()
    {
        return $this->hasOne(Guru::className(), ['id' => 'guru_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }
}
