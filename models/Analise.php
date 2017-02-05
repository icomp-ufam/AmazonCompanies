<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "analise".
 *
 * @property integer $idanalise
 * @property string $texto
 * @property integer $status
 * @property integer $idEmpresa
 *
 * @property Empresa $idEmpresa0
 */
class Analise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','texto', 'textoAnalisador'], 'string'],
            [['idEmpresa','Usuario_idUsuario'], 'required'],
            [[ 'idEmpresa','Usuario_idUsuario'], 'integer'],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['idEmpresa' => 'idEmpresa']],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Analise::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'Usuario_idUsuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanalise' => 'Idanalise',
            'texto' => 'Texto',
            'textoAnalisador' => 'Análise',
            'status' => 'Status',
            'idEmpresa' => 'Empresa',
            'Usuario_idUsuario' => Yii::t('app', 'Usuário'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['idEmpresa' => 'idEmpresa']);
    }

    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
    
    // retorna a quantidade de status pendentes
    public function getNotification(){
    	$query = Analise::find()->where(['status' => '2'])->count();
    	return $query;
    }

    public function getNotificacaos()
    {
        return $this->hasMany(Notificacao::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }
}
