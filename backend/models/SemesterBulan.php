<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester_bulan".
 *
 * @property int $id
 * @property string $bulan
 * @property int $tahun_ajaran_semester_id
 *
 * @property BulanAngkatan[] $bulanAngkatans
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class SemesterBulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester_bulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bulan', 'tahun_ajaran_semester_id'], 'required'],
            [['tahun_ajaran_semester_id'], 'integer'],
            [['bulan'], 'string', 'max' => 255],
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
            'bulan' => 'Bulan',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBulanAngkatan()
    {
        return $this->hasMany(BulanAngkatan::className(), ['semester_bulan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }
}
