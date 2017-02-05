<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacao".
 *
 * @property integer $idNotificacao
 * @property integer $Usuario_idUsuario
 * @property integer $status
 * @property string $conteudo
 * @property integer $tipo
 *
 * @property Usuario $usuarioIdUsuario
 */
class Notificacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

   
    public static function tableName()
    {
        return 'notificacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Usuario_idUsuario', 'status', 'conteudo', 'tipo', 'idAnalise'], 'required'],
            [['Usuario_idUsuario', 'status', 'tipo', 'idAnalise'], 'integer'],
            [['conteudo']],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Analise::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idanalise']],
            [['idAnalise'], 'exist', 'skipOnError' => true, 'targetClass' => Analise::className(), 'targetAttribute' => ['idAnalise' => 'idanaise']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNotificacao' => Yii::t('app', 'Id Notificacao'),
            'Usuario_idUsuario' => Yii::t('app', 'Usuario Id Usuario'),
            'status' => Yii::t('app', 'Status'),
            
            'tipo' => Yii::t('app', 'Tipo'),
            'idAnalise' => Yii::t('app', 'Usuário'),
            'conteudo' => Yii::t('app', 'Texto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }

    public function getAnalise()
    {
        return $this->hasOne(Analise::className(), ['idanalise' => 'idAnalise']);
    }
    
    // retorna a quantidade de status pendentes
    public function getNotification(){
    	
    	$id = Yii::$app->user->getId();
    	 
    	$query = Notificacao::find()->where(['Usuario_idUsuario' => $id])->count();
        $query = Notificacao::find()->where(['idAnalise' => $id])->count();
        
    	
    	return $query;
    }
    
}
