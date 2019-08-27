<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester_angkatan".
 *
 * @property int $id
 * @property int $angkatan_id
 * @property int $tahun_ajaran_semester_id
 *
 * @property Angkatan $angkatan
 * @property TahunAjaranSemester $tahunAjaranSemester
 */
class SemesterAngkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester_angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['angkatan_id', 'tahun_ajaran_semester_id'], 'required'],
            [['angkatan_id', 'tahun_ajaran_semester_id'], 'integer'],
            [['angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Angkatan::className(), 'targetAttribute' => ['angkatan_id' => 'id']],
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
            'angkatan_id' => 'Angkatan ID',
            'tahun_ajaran_semester_id' => 'Tahun Ajaran Semester ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(), ['id' => 'angkatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunAjaranSemester()
    {
        return $this->hasOne(TahunAjaranSemester::className(), ['id' => 'tahun_ajaran_semester_id']);
    }
}
