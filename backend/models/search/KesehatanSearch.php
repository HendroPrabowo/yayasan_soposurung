<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kesehatan;

/**
 * KesehatanSearch represents the model behind the search form of `app\models\Kesehatan`.
 */
class KesehatanSearch extends Kesehatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun_ajaran_semester_id'], 'integer'],
            [['siswa_id', 'keterangan', 'penyakit', 'tanggal', 'created_by'], 'safe'],
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
        $query = Kesehatan::find();

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
            'tahun_ajaran_semester_id' => $this->tahun_ajaran_semester_id,
            'tanggal' => $this->tanggal,
            'created_by' => $this->created_by
        ]);

        $query->andFilterWhere(['like', 'siswa_id', $this->siswa_id])
            ->andFilterWhere(['like', 'penyakit', $this->penyakit])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
