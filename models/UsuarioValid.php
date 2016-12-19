<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

class UsuarioValid extends Usuario{

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
					'type' => 'textInput'
					/*
					 * 'label' => 'Ativar',
	'type' => 'widget',
	'widgetClass' => \kartik\widgets\SwitchInput::classname(),
	'options' =>
	[
			'pluginOptions' => [
					'onColor' => 'success',
					'onText' => 'Ativado',
					'offText' => 'Desativado'
			]
	],
	*
	*
	*
	*/
			]

	];
}
}