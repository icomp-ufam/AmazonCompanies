<?php
Yii::$app->language = 'pt-Br';
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">
	<div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'identificadorPessoa')->dropdownList([
							'prompt' => 'Selecione...',
							2 => 'Aluno',
							3 => 'Empresa'
					])->label('Tipo de Usuário')?>
	
    <?= $form->field($model, 'login')->textInput(['maxlength' => true])->hint('Ex: Usuário123') ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true])->hint('Ex: Nome Sobrenome')->label("Nome Completo") ?>

    <?= $form->field($model, 'senha')->passwordInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'repetir_senha')->passwordInput(['maxlength' => true])->label('Repetir Senha') ?>
	
    <?= $form->field($model, 'ativo')->hiddenInput(['value'=>'2'])->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->hint('Ex: usuário@email.com.br')->label('E-mail') ?>

    <div class = "form-group">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
  				<div class="alert alert-success alert-dismissable">
  					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">OK</button>
  					<h4><i class="icon fa fa-check"></i>Cadastro Realizado com sucesso!</h4>
  		<?= Yii::$app->session->getFlash('success') ?>
  				</div>
		<?php endif; ?>
       <?= Html::submitButton('Enviar Dados', [
       		'class' => 'btn btn-success'
       ]) ?>
  
    	<?= Html::a('Cancelar', ['/site/'], ['class'=>'btn btn-danger']) ?>
    	  	
    </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>

