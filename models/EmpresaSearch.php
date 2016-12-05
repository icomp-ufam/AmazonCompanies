<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmpresa', 'Tipo_Empresa_idTipo_Empresa'], 'integer'],
            [['nome', 'analise', 'fonte', 'logotipo'], 'safe'],
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
        $query = Empresa::find();


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
            'idEmpresa' => $this->idEmpresa,
            'Tipo_Empresa_idTipo_Empresa' => $this->Tipo_Empresa_idTipo_Empresa,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'analise', $this->analise])
            ->andFilterWhere(['like', 'fonte', $this->fonte])
            ->andFilterWhere(['like', 'logotipo', $this->logotipo]);

        return $dataProvider;
    }
}
