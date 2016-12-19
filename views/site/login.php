<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Identifique-se';

?>
<div class="site-login">
	<div class="row">
    <div class="col-md-8">
    <h1><?= Html::encode($this->title) ?></h1>
        <br>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'login')->textInput(['autofocus' => false]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-md-offset-1 col-md-3\">{input} {label}</div>\n<div class=\"col-md-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-md-offset-1 col-md-11">
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> <button type="button" class="btn btn-link" data-toggle="modal" data-target="#recuperar">Recuperar Senha</button>
            	<div class="modal" id="recuperar" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Recuperar Senha</h3>
        					<h4>Insira seu e-mail para recuperacao de senha</h4>
        				</div>
        				<div class="modal-body">	
        					<div class="form">
  								<label for="email">E-mail:</label>
  								<input type="email" class="form-control" id="email">
  							</div>
        				</div>
        				<div class="modal-footer">
          					<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        				</div>
      				</div>
    			</div>
  			</div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
	</div>


    
  <div class = "visitorcad">  
    <div class="col-md-4">
    	<h1>Não é Cadastrado?</h1>
    	<br>
    	<h3>É simples e fácil!</h3>
    	<!-- Redirecion para o Cadastro -->
    	<?= Html::a('Cadastre-se', ['/usuario/create'], ['class'=>'btn btn-primary']) ?>
    </div>
  </div>  
 </div>   
  </div>  

