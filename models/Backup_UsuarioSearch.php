<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'ativo', 'identificadorPessoa'], 'integer'],
            [['login', 'nome', 'senha', 'email'], 'safe'],
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
        $query = Usuario::find()->indexBy('idUsuario');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        		'pagination' => [
        				'pagesize' => 10
        		]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUsuario' => $this->idUsuario,
            'ativo' => $this->ativo,
            'identificadorPessoa' => $this->identificadorPessoa,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
    
    public function getFormAttribs() {
    	return [
    
    			'idUsuario' =>[
    					'type' =>  'hiddenInput',
    					'columnOptions' => ['hidden'=>true]
    			],
    			'login' => [
    					'type' => 'staticInput',
    			],
    			'nome' => [
    					'type' => 'staticInput',
    			],
    			'email' => [
    					'type' => 'staticInput',
    			],
    			'ativo' => [
    	
    					  'label' => 'Ativar',
    	'type' => 'widget',
    	'widgetClass' => \kartik\widgets\SwitchInput::classname(),
    	'options' =>
    	[
    			'pluginOptions' => [
    					'offColor'= 'danger',
    					'onColor' => 'success',
    					'onText' => 'Ativado',
    					'offText' => 'Desativado'
    			]
    	],
    	
    			]
    
    	];
    }
    
}
