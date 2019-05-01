<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aturan_asrama".
 *
 * @property int $id
 * @property string $jenis_pelanggaran
 * @property int $point
 */
class AturanAsrama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aturan_asrama';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_pelanggaran', 'point'], 'required'],
            [['point'], 'integer', 'max' => '100', 'min' => '1'],
            [['jenis_pelanggaran'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_pelanggaran' => 'Jenis Pelanggaran',
            'point' => 'Point',
        ];
    }
}
