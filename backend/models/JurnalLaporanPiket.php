<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurnal_laporan_piket".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $user_id
 * @property string $piket1
 * @property string $piket2
 * @property string $wakil_piket1
 * @property string $wakil_piket2
 *
 * @property AplMalam[] $aplMalam
 * @property AplMknMalam[] $aplMknMalam
 * @property AplMknSiang[] $aplMknSiang
 * @property AplPgiKelas[] $aplPgiKelas
 * @property AplSore[] $aplSore
 * @property User $user
 * @property SwAplMknPgi[] $swAplMknPgi
 * @property SwSenamAplPgi[] $swSenamAplPgi
 */
class JurnalLaporanPiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurnal_laporan_piket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'user_id'], 'required'],
            [['tanggal'], 'safe'],
            [['user_id'], 'integer'],
            [['piket1', 'piket2', 'wakil_piket1', 'wakil_piket2'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'user_id' => 'User ID',
            'piket1' => 'Piket 1',
            'piket2' => 'Piket 2',
            'wakil_piket1' => 'Wakil Piket 1',
            'wakil_piket2' => 'Wakil Piket 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getSwSenamAplPgi(){
        return $this->hasMany(SwSenamAplPgi::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getSwAplMknPgi(){
        return $this->hasMany(SwAplMknPgi::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getAplPgiKelas(){
        return $this->hasMany(AplPgiKelas::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getAplMknSiang(){
        return $this->hasMany(AplMknSiang::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getAplSore(){
        return $this->hasMany(AplSore::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getAplMknMalam(){
        return $this->hasMany(AplMknMalam::className(), ['jurnal_laporan_id' => 'id']);
    }

    public function getAplMalam(){
        return $this->hasMany(AplMalam::className(), ['jurnal_laporan_id' => 'id']);
    }
}
