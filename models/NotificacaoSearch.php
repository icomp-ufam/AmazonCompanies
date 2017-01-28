<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notificacao;

/**
 * NotificacaoSearch represents the model behind the search form about `app\models\Notificacao`.
 */
class NotificacaoSearch extends Notificacao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNotificacao', 'Usuario_idUsuario', 'status', 'tipo'], 'integer'],
            [['conteudo'], 'safe'],
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
    	$id = Yii::$app->user->getId();
    	
        $query = Notificacao::find()->where(['Usuario_idUsuario' => $id]);

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
            'idNotificacao' => $this->idNotificacao,
            //'Usuario_idUsuario' => $this->Usuario_idUsuario,
            'status' => $this->status,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'conteudo', $this->conteudo]);

        return $dataProvider;
    }
}
