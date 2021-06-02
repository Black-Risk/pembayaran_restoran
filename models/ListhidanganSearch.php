<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Listhidangan;

/**
 * ListhidanganSearch represents the model behind the search form of `app\models\Listhidangan`.
 */
class ListhidanganSearch extends Listhidangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idHidangan', 'namaHidangan', 'fotoHidangan'], 'safe'],
            [['hargaHidangan'], 'integer'],
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
        $query = Listhidangan::find();

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
            'hargaHidangan' => $this->hargaHidangan,
        ]);

        $query->andFilterWhere(['like', 'idHidangan', $this->idHidangan])
            ->andFilterWhere(['like', 'namaHidangan', $this->namaHidangan])
            ->andFilterWhere(['like', 'fotoHidangan', $this->fotoHidangan]);

        return $dataProvider;
    }
}
