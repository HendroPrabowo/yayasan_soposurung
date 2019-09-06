<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tahun_ajaran_semester".
 *
 * @property int $id
 * @property string $tahun_ajaran
 * @property string $semester
 * @property int is_active
 *
 * @property SiswaTahunAjaran[] $siswaTahunAjarans
 * @property TahunAjaranKelas[] $tahunAjaranKelas
 */
class TahunAjaranSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tahun_ajaran_semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_ajaran'], 'required'],
            ['is_active', 'integer'],
            [['semester'], 'string'],
            [['tahun_ajaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun_ajaran' => 'Tahun Ajaran',
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaTahunAjarans()
    {
        return $this->hasMany(SiswaTahunAjaran::className(), ['tahun_ajaran_semester_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranKelas()
    {
        return $this->hasMany(TahunAjaranKelas::className(), ['tahun_ajaran_semester_id' => 'id']);
    }

    public function getSemesterBulan(){
        return $this->hasMany(SemesterBulan::className(), ['tahun_ajaran_semester_id' => 'id']);
    }
}
