<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Componentes;

/**
 * ComponentesSearch represents the model behind the search form of `app\models\Componentes`.
 */
class ComponentesSearch extends Componentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'anuncio_id'], 'integer'],
            [['nombre', 'tipo', 'formato', 'peso', 'texto', 'posicion'], 'safe'],
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
        $query = Componentes::find();

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
            'anuncio_id' => $this->anuncio_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'formato', $this->formato])
            ->andFilterWhere(['like', 'peso', $this->peso])
            ->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'posicion', $this->posicion]);

        return $dataProvider;
    }
}
