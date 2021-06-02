<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Riwayattransaksi;

/**
 * RiwayattransaksiSearch represents the model behind the search form of `app\models\Riwayattransaksi`.
 */
class RiwayattransaksiSearch extends Riwayattransaksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPesanan'], 'integer'],
            [['listPesanan', 'waktuPesanan'], 'safe'],
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
        $query = Riwayattransaksi::find();

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
            'idPesanan' => $this->idPesanan,
            'waktuPesanan' => $this->waktuPesanan,
        ]);

        $query->andFilterWhere(['like', 'listPesanan', $this->listPesanan]);

        return $dataProvider;
    }
}
