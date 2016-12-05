<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $login
 * @property string $nome
 * @property string $senha
 * @property integer $ativo
 * @property integer $identificadorPessoa
 * @property string $email
 *
 * @property Comentario[] $comentarios
 * @property EmpresaHasUsuario[] $empresaHasUsuarios
 * @property Empresa[] $empresaIdEmpresas
 * @property Notificacao[] $notificacaos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'nome', 'senha', 'ativo', 'identificadorPessoa', 'email'], 'required'],
            [['ativo', 'identificadorPessoa'], 'integer'],
            [['login', 'nome', 'senha', 'email'], 'string', 'max' => 45],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'login' => 'Login',
            'nome' => 'Nome',
            'senha' => 'Senha',
            'ativo' => 'Ativo',
            'identificadorPessoa' => 'Identificador Pessoa',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaHasUsuarios()
    {
        return $this->hasMany(EmpresaHasUsuario::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaIdEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['idEmpresa' => 'Empresa_idEmpresa'])->viaTable('empresaHasUsuario', ['Usuario_idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacaos()
    {
        return $this->hasMany(Notificacao::className(), ['Usuario_idUsuario' => 'idUsuario']);
    }
    
    public function setAtivo($id)
    {
    	return mysql_query("UPDATE usuario SET ativo='1' WHERE id=$id");
    	
    	//$this->set(Usuario::className(), ['Usuario_idUsuario' => 'idUsuario']);
    	
    	
    	//UPDATE `usuario` SET `ativo` = '1' WHERE `usuario`.`idUsuario` = $id;
    	
    	
  /*  	$_get_categoria_tipo_marca=CategoriaTipoMarca::model()->findAll(array('order' => 'categoria_tipo_marca asc'));
    	return CHtml::listData($_get_categoria_tipo_marca,"id","categoria_tipo_marca");
    	Yii::app()->findall();
    	*/
    }
}
