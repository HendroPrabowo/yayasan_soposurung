<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BulanAngkatan;

/**
 * BulanAngkatanSearch represents the model behind the search form of `app\models\BulanAngkatan`.
 */
class BulanAngkatanSearch extends BulanAngkatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'angkatan_id', 'semester_bulan_id'], 'integer'],
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
        $query = BulanAngkatan::find();

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
            'angkatan_id' => $this->angkatan_id,
            'semester_bulan_id' => $this->semester_bulan_id,
        ]);

        return $dataProvider;
    }
}
