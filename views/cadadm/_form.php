<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\cadadm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cadadm-form">
	<div class="col-md-4">
				    <!-- Criar Ativo =  1, Identificar Pessoa (depende da tab) e Senha (gerar aleatório e mandar via email) -->
				    <?php $form = ActiveForm::begin(); ?>

					<?= $form->field($model, 'identificadorPessoa')->dropdownList([
							'prompt' => 'Selecione...',
							1 => 'Administrador',
							2 => 'Aluno',
							3 => 'Empresa'
					])->label('Tipo de Usuário')?>
    				
    				<?= $form->field($model, 'login')->textInput(['maxlength' => true])->hint('Ex: gisa123')->label('Nome de Usuário') ?>
				
    				<?= $form->field($model, 'nome')->textInput(['maxlength' => true])->hint('Ex: Gisele Almeida') ?>
					
					<!-- Aqui é gerado uma senha aleatoria que será mandado via e-mail para o usuario, a senha que será inserida no bd é encriptografada -->
					<?php $senha = Yii::$app->getSecurity()->generateRandomString(8)?>
					<?= $form->field($model, 'senha')->hiddenInput(['value' => $senha])->label(false) ?>
					
					<?= $form->field($model, 'ativo')->hiddenInput(['value'=>'1'])->label(false) ?>
					
    				<?= $form->field($model, 'email')->textInput(['maxlength' => true])->hint('Ex: gii@icomp.ufam.edu.br')->label('E-mail') ?>
					
        <div class = "form-group">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
  				<div class="alert alert-success alert-dismissable">
  					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">OK</button>
  					<!-- <h4><i class="icon fa fa-check"></i>Usuário Cadastrado com sucesso!</h4>  Opção para aparecer mais alguma informação-->
  		<?= Yii::$app->session->getFlash('success') ?>
  				</div>
		<?php endif; ?>
       <?= Html::submitButton('Cadastrar Usuário', ['class' => 'btn btn-success']) ?>
       
    	<?= Html::a('Cancelar', ['/site/adm'], ['class'=>'btn btn-danger']) ?>
    	
    </div>
    
			<?php ActiveForm::end(); ?>
	</div>

</div>