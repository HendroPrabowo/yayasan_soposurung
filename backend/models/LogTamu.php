<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_tamu".
 *
 * @property int $id
 * @property string $nama_tamu
 * @property string $tujuan_dan_keperluan
 * @property string $waktu_masuk
 * @property string $waktu_keluar
 * @property int $user_id
 *
 * @property User $user
 */
class LogTamu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_tamu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tamu', 'tujuan_dan_keperluan', 'user_id'], 'required'],
            [['tujuan_dan_keperluan'], 'string'],
            [['waktu_masuk', 'waktu_keluar'], 'safe'],
            [['user_id'], 'integer'],
            [['nama_tamu'], 'string', 'max' => 500],
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
            'nama_tamu' => 'Nama Tamu',
            'tujuan_dan_keperluan' => 'Tujuan Dan Keperluan',
            'waktu_masuk' => 'Waktu Masuk',
            'waktu_keluar' => 'Waktu Keluar',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
