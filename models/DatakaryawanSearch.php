<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datakaryawan;

/**
 * DatakaryawanSearch represents the model behind the search form of `app\models\Datakaryawan`.
 */
class DatakaryawanSearch extends Datakaryawan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'namaKaryawan', 'jkelaminKaryawan', 'tempatlahirKaryawan', 'tgllahirKaryawan', 'agamaKaryawan', 'alamatKaryawan', 'statusKaryawan', 'nohpKaryawan', 'fotoKaryawan'], 'safe'],
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
        $query = Datakaryawan::find();

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
            'tgllahirKaryawan' => $this->tgllahirKaryawan,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'namaKaryawan', $this->namaKaryawan])
            ->andFilterWhere(['like', 'jkelaminKaryawan', $this->jkelaminKaryawan])
            ->andFilterWhere(['like', 'tempatlahirKaryawan', $this->tempatlahirKaryawan])
            ->andFilterWhere(['like', 'agamaKaryawan', $this->agamaKaryawan])
            ->andFilterWhere(['like', 'alamatKaryawan', $this->alamatKaryawan])
            ->andFilterWhere(['like', 'statusKaryawan', $this->statusKaryawan])
            ->andFilterWhere(['like', 'nohpKaryawan', $this->nohpKaryawan])
            ->andFilterWhere(['like', 'fotoKaryawan', $this->fotoKaryawan]);

        return $dataProvider;
    }
}
