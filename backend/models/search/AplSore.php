<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AplSore as AplSoreModel;

/**
 * AplSore represents the model behind the search form of `app\models\AplSore`.
 */
class AplSore extends AplSoreModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun_ajaran_kelas_id', 'jumlah', 'hadir', 'tidak_hadir', 'jurnal_laporan_id'], 'integer'],
            [['keterangan_tidak_hadir'], 'safe'],
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
        $query = AplSoreModel::find();

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
            'id' => $this->id,
            'tahun_ajaran_kelas_id' => $this->tahun_ajaran_kelas_id,
            'jumlah' => $this->jumlah,
            'hadir' => $this->hadir,
            'tidak_hadir' => $this->tidak_hadir,
            'jurnal_laporan_id' => $this->jurnal_laporan_id,
        ]);

        $query->andFilterWhere(['like', 'keterangan_tidak_hadir', $this->keterangan_tidak_hadir]);

        return $dataProvider;
    }
}
