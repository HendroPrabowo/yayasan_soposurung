<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JurnalLaporanPiket as JurnalLaporanPiketModel;

/**
 * JurnalLaporanPiket represents the model behind the search form of `app\models\JurnalLaporanPiket`.
 */
class JurnalLaporanPiket extends JurnalLaporanPiketModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['tanggal', 'piket1', 'piket2', 'wakil_piket1', 'wakil_piket2'], 'safe'],
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
        $query = JurnalLaporanPiketModel::find();

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
            'tanggal' => $this->tanggal,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'piket1', $this->piket1]);
        $query->andFilterWhere(['like', 'piket2', $this->piket2]);
        $query->andFilterWhere(['like', 'wakil_piket1', $this->wakil_piket1]);
        $query->andFilterWhere(['like', 'wakil_piket2', $this->wakil_piket2]);

        return $dataProvider;
    }
}
