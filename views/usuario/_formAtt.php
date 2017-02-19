<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">
	<div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>
	
    <?= $form->field($model, 'login')->textInput(['maxlength' => true])->label('Login') ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha')->passwordInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'repetir_senha')->passwordInput(['maxlength' => true])->label('Repetir Senha') ?>
	
    <?= $form->field($model, 'ativo')->hiddenInput(['value'=>'1'])->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('E-mail') ?>

    <div class = "form-group">
       
       <?= Html::submitButton('Enviar Dados', [
       		'class' => 'btn btn-success'
       ])?>

       <?php if($model->identificadorPessoa == 1){ ?> <!-- Administrador -->
    	<?= Html::a('Cancelar', ['/site/adm'], ['class'=>'btn btn-danger']) ?>
    	<?php }else if($model->identificadorPessoa == 2){ ?> <!-- Aluno -->
    	<?= Html::a('Cancelar', ['/site/aluno'], ['class'=>'btn btn-danger']) ?>
    	<?php }else{ ?> <!-- Empresa -->
    	<?= Html::a('Cancelar', ['/site/empresa'], ['class'=>'btn btn-danger']) ?>
    	<?php }?>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>

