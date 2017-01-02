<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Validar Cadastros (Save não funciona!)';


?>

<?php $form = ActiveForm::begin();

echo TabularForm::widget([
		'form' => $form,
		'dataProvider' => $dataProvider,
		'attributes' => [
				'idUsuario' => ['type' => TabularForm::INPUT_STATIC, 'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER]],
				'login' => ['type' => TabularForm::INPUT_TEXT],
				'identificadorPessoa' => [ 'type' => TabularForm::INPUT_TEXT],
				'nome' => [
						'type' => TabularForm::INPUT_TEXT,
						//'items'=>ArrayHelper::map(Usuario::find()->orderBy('nome')->asArray()->all(), 'idUsuario', 'nome')
				],
				'ativo' => [
						'type' => TabularForm::INPUT_TEXT,
						'options'=>['class'=>'form-control text-right'],
						'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
				],
				'email' => [
						'type' => TabularForm::INPUT_STATIC,
						'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
				],
		],
		'gridSettings' => [
				'floatHeader' => true,
				'panel' => [
						'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Não está salvando!</h3>',
						'type' => GridView::TYPE_PRIMARY,
						'after'=>
						Html::a(
								'<i class="glyphicon glyphicon-plus"></i> Add New',
								'usuario/create',
								['class'=>'btn btn-success']
								) . '&nbsp;' .
						Html::a(
								'<i class="glyphicon glyphicon-remove"></i> Delete',
								'create',
								['class'=>'btn btn-danger']
								) . '&nbsp;' .
						Html::submitButton(
								'<i class="glyphicon glyphicon-floppy-disk"></i> Save',
								['class'=>'btn btn-primary']
								)
				]
		]
]);

 ActiveForm::end(); ?>