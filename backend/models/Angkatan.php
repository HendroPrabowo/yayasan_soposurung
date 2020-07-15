<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "angkatan".
 *
 * @property int $id
 * @property string $angkatan
 * @property int $wali_angkatan_id
 *
 * @property WaliAngkatan $waliAngkatan
 * @property SemesterAngkatan[] $semesterAngkatan
 */
class Angkatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'angkatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['angkatan'], 'required'],
            [['wali_angkatan_id'], 'integer'],
            [['angkatan'], 'string', 'max' => 255],
            [['wali_angkatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => WaliAngkatan::className(), 'targetAttribute' => ['wali_angkatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'angkatan' => 'Angkatan',
            'wali_angkatan_id' => 'Wali Angkatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaliAngkatan()
    {
        return $this->hasOne(WaliAngkatan::className(), ['id' => 'wali_angkatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterAngkatan()
    {
        return $this->hasMany(SemesterAngkatan::className(), ['angkatan_id' => 'id']);
    }
}
