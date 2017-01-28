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
            [['Usuario_idUsuario', 'status', 'conteudo', 'tipo'], 'required'],
            [['Usuario_idUsuario', 'status', 'tipo'], 'integer'],
            [['conteudo'], 'text'],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
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
            'conteudo' => Yii::t('app', 'Conteudo'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
    
    // retorna a quantidade de status pendentes
    public function getNotification(){
    	
    	$id = Yii::$app->user->getId();
    	 
    	$query = Notificacao::find()->where(['Usuario_idUsuario' => $id])->count();
    	
    	return $query;
    }
    
}
