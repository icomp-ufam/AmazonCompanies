<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Analise;

/**
 * AnaliseSearch represents the model behind the search form about `app\models\Analise`.
 */
class AnaliseSearch extends Analise
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanalise', 'status', 'idEmpresa'], 'integer'],
            [['texto', 'textoAnalisador','Usuario_idUsuario'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Analise::find();

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
            'idanalise' => $this->idanalise,
            'status' => $this->status,
            'idEmpresa' => $this->idEmpresa,
        ]);

        $query->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }
}
