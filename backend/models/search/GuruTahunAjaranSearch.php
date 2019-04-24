<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GuruTahunAjaran;

/**
 * GuruTahunAjaranSearch represents the model behind the search form of `app\models\GuruTahunAjaran`.
 */
class GuruTahunAjaranSearch extends GuruTahunAjaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'guru_id', 'tahun_ajaran_semester_id'], 'integer'],
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
        $query = GuruTahunAjaran::find();

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
            'guru_id' => $this->guru_id,
            'tahun_ajaran_semester_id' => $this->tahun_ajaran_semester_id,
        ]);

        return $dataProvider;
    }
}
