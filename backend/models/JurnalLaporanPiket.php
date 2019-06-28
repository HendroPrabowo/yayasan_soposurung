<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jurnal_laporan_piket".
 *
 * @property int $id
 * @property string $jam
 * @property string $tanggal
 * @property int $user_id
 * @property string $wakil_piket
 *
 * @property User $user
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
            [['tanggal', 'user_id', 'wakil_piket'], 'required'],
            [['jam', 'tanggal'], 'safe'],
            [['user_id'], 'integer'],
            [['wakil_piket'], 'string', 'max' => 255],
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
            'jam' => 'Jam',
            'tanggal' => 'Tanggal',
            'user_id' => 'User ID',
            'wakil_piket' => 'Wakil Piket',
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
