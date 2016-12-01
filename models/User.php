<?php

namespace app\models;

use app\models\Usuario as Usuario;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
	public $idUsuario;
	public $nome;
	public $senha;
	public $email;
	public $ativo;
	public $identificadorPessoa;

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id) {
		$Usuario = Usuario::find()
		->where([
				"idUsuario" => $id
		])
		->one();
		if (!count($Usuario)) {
			return null;
		}
		return new static($Usuario);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $userType = null) {

		$Usuario = Usuario::find()
		->where(["accessToken" => $token])
		->one();
		if (!count($Usuario)) {
			return null;
		}
		return new static($Usuario);
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username) {
		$Usuario = Usuario::find()
		->where([
				"nome" => $username
		])
		->one();
		if (!count($Usuario)) {
			return null;
		}
		return new static($Usuario);
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->idUsuario;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return null;
		//$this->authKey;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return null;
		//$this->authKey === $authKey;
	}

	// valida a senha, lê  senhas encriptografadas em MD5
	public function validatePassword($password)
	{
		return $this->senha === md5($password);
	}

	// obtém o tipo do usuario (tipo 1 = adm, tipo 2 = aluno e tipo 3 = empresa)
	public function getIdentificadorPessoa(){
		return $this->identificadorPessoa;
	}

	// obtém o status do usuario (status 1 = ativo, status 0 = não ativo)
	public function getAtivo(){
		return $this->ativo;
	}

	// obtém o nome do usuario
	public function getNome(){
		return $this->nome;
	}

	// obtém o email do usuario
	public  function getEmail(){
		return $this->email;
	}
}