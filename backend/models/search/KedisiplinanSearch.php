<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kedisiplinan;

/**
 * KedisiplinanSearch represents the model behind the search form of `app\models\Kedisiplinan`.
 */
class KedisiplinanSearch extends Kedisiplinan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'aturan_asrama_id', 'tambah_ke_point'], 'integer'],
            [['siswa_id', 'keterangan'], 'safe'],
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
        $query = Kedisiplinan::find();

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
            'aturan_asrama_id' => $this->aturan_asrama_id,
            'tambah_ke_point' => $this->tambah_ke_point,
        ]);

        $query->andFilterWhere(['like', 'siswa_id', $this->siswa_id])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
