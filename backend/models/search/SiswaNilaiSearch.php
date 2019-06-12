<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SiswaNilai;

/**
 * SiswaNilaiSearch represents the model behind the search form of `app\models\SiswaNilai`.
 */
class SiswaNilaiSearch extends SiswaNilai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kelas_siswa_id', 'kelas_mata_pelajaran_id'], 'integer'],
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
        $query = SiswaNilai::find();

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
            'kelas_siswa_id' => $this->kelas_siswa_id,
            'kelas_mata_pelajaran_id' => $this->kelas_mata_pelajaran_id,
        ]);

        return $dataProvider;
    }
}
