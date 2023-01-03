<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Klanten;

/**
 * KlantenSearch represents the model behind the search form of `frontend\models\Klanten`.
 */
class KlantenSearch extends Klanten
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'klantennaam', 'telefoonnummer', 'Adress', 'Opmerkingen'], 'integer'],
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
        $query = Klanten::find();

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
            'ID' => $this->ID,
            'klantennaam' => $this->klantennaam,
            'telefoonnummer' => $this->telefoonnummer,
            'Adress' => $this->Adress,
            'Opmerkingen' => $this->Opmerkingen,
        ]);

        return $dataProvider;
    }
}
