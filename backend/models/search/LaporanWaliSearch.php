<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaporanWali;

/**
 * LaporanWaliSearch represents the model behind the search form of `app\models\LaporanWali`.
 */
class LaporanWaliSearch extends LaporanWali
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'semester_angkatan_id'], 'integer'],
            [['akademik', 'prestasi', 'absensi', 'catatan', 'fisik', 'organisasi', 'administrasi', 'siswa_id'], 'safe'],
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
        $query = LaporanWali::find();

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
            'semester_angkatan_id' => $this->semester_angkatan_id,
        ]);

        $query->andFilterWhere(['like', 'akademik', $this->akademik])
            ->andFilterWhere(['like', 'prestasi', $this->prestasi])
            ->andFilterWhere(['like', 'absensi', $this->absensi])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'fisik', $this->fisik])
            ->andFilterWhere(['like', 'organisasi', $this->organisasi])
            ->andFilterWhere(['like', 'administrasi', $this->administrasi])
            ->andFilterWhere(['like', 'siswa_id', $this->siswa_id]);

        return $dataProvider;
    }
}
