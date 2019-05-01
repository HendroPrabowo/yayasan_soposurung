<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AturanAsrama;

/**
 * AturanAsramaSearch represents the model behind the search form of `app\models\AturanAsrama`.
 */
class AturanAsramaSearch extends AturanAsrama
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'point'], 'integer'],
            [['jenis_pelanggaran'], 'safe'],
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
        $query = AturanAsrama::find();

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
            'point' => $this->point,
        ]);

        $query->andFilterWhere(['like', 'jenis_pelanggaran', $this->jenis_pelanggaran]);

        return $dataProvider;
    }
}
