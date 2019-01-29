<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Siswa;

/**
 * SiswaSearch represents the model behind the search form of `app\models\Siswa`.
 */
class SiswaSearch extends Siswa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nisn', 'nama', 'kelahiran', 'jenis_kelamin', 'agama', 'status_dalam_keluarga', 'sekolah_asal', 'nama_ayah', 'nama_ibu', 'alamat_orang_tua', 'pekerjaan_ayah', 'pekerjaan_ibu'], 'safe'],
            [['anak_ke', 'nomor_telepon_orang_tua', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Siswa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'anak_ke' => $this->anak_ke,
            'nomor_telepon_orang_tua' => $this->nomor_telepon_orang_tua,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nisn', $this->nisn])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'kelahiran', $this->kelahiran])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'status_dalam_keluarga', $this->status_dalam_keluarga])
            ->andFilterWhere(['like', 'sekolah_asal', $this->sekolah_asal])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'alamat_orang_tua', $this->alamat_orang_tua])
            ->andFilterWhere(['like', 'pekerjaan_ayah', $this->pekerjaan_ayah])
            ->andFilterWhere(['like', 'pekerjaan_ibu', $this->pekerjaan_ibu]);

        return $dataProvider;
    }
}
