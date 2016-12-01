<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
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
				[['nome', 'senha', 'ativo', 'identificadorPessoa', 'email'], 'required'],
				[['ativo', 'identificadorPessoa'], 'integer'],
				[['nome', 'senha', 'email'], 'string', 'max' => 45],
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
}