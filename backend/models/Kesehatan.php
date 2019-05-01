<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kesehatan".
 *
 * @property int $id
 * @property string $siswa_id
 * @property string $kesehatan
 * @property int $semester
 * @property string $tanggal
 * @property string $created_by
 *
 * @property Siswa $siswa
 */
class Kesehatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kesehatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siswa_id', 'kesehatan', 'semester', 'tanggal'], 'required'],
            [['semester'], 'integer', 'max' => '8', 'min' => '1'],
            [['tanggal'], 'safe'],
            [['siswa_id'], 'string', 'max' => 255],
            [['created_by'], 'string', 'max' => 255],
            [['kesehatan'], 'string', 'max' => 500],
            [['siswa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_id' => 'nisn']],
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
            'kesehatan' => 'Kesehatan',
            'semester' => 'Semester',
            'tanggal' => 'Tanggal',
            'created_by' => 'Created By'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(Siswa::className(), ['nisn' => 'siswa_id']);
    }
}
