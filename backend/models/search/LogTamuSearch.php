<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogTamu;

/**
 * LogTamuSearch represents the model behind the search form of `app\models\LogTamu`.
 */
class LogTamuSearch extends LogTamu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['nama_tamu', 'tujuan_dan_keperluan', 'waktu_masuk', 'waktu_keluar'], 'safe'],
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
        $query = LogTamu::find();

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
            'waktu_masuk' => $this->waktu_masuk,
            'waktu_keluar' => $this->waktu_keluar,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nama_tamu', $this->nama_tamu])
            ->andFilterWhere(['like', 'tujuan_dan_keperluan', $this->tujuan_dan_keperluan]);

        return $dataProvider;
    }
}
