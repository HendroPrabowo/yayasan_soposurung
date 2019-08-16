<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property int $id
 * @property string $no_induk_guru
 * @property string $username
 * @property string $nama
 * @property int $user_id
 *
 * @property AssignGuru[] $assignGurus
 * @property User $user
 */
class GuruUpdate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['no_induk_guru', 'username', 'nama'], 'string', 'max' => 255],
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
            'no_induk_guru' => 'No Induk Guru',
            'username' => 'Username',
            'nama' => 'Nama',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignGurus()
    {
        return $this->hasMany(AssignGuru::className(), ['guru_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
