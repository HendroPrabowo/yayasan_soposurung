<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penilaian as PenilaianModel;

/**
 * Penilaian represents the model behind the search form of `app\models\Penilaian`.
 */
class Penilaian extends PenilaianModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kelas_siswa_id', 'komponen_nilai_id', 'nilai'], 'integer'],
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
        $query = PenilaianModel::find();

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
            'komponen_nilai_id' => $this->komponen_nilai_id,
            'nilai' => $this->nilai,
        ]);

        return $dataProvider;
    }
}
