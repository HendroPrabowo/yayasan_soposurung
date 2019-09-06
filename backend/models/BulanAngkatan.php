<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bulan_angkatan".
 *
 * @property int $id
 * @property int $angkatan_id
 * @property int $semester_bulan_id
 *
 * @property Angkatan $angkatan
 * @property SemesterBulan $semesterBulan
 * @property BulanSiswa[] $bulanSiswas
 */
class BulanAngkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bulan_angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['angkatan_id', 'semester_bulan_id'], 'required'],
            [['angkatan_id', 'semester_bulan_id'], 'integer'],
            [['angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Angkatan::className(), 'targetAttribute' => ['angkatan_id' => 'id']],
            [['semester_bulan_id'], 'exist', 'skipOnError' => true, 'targetClass' => SemesterBulan::className(), 'targetAttribute' => ['semester_bulan_id' => 'id']],
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
            'semester_bulan_id' => 'Semester Bulan ID',
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
    public function getSemesterBulan()
    {
        return $this->hasOne(SemesterBulan::className(), ['id' => 'semester_bulan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBulanSiswa()
    {
        return $this->hasMany(BulanSiswa::className(), ['bulan_angkatan_id' => 'id']);
    }
}
