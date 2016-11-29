<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */



$this->title = 'Seu Perfil';

?>

<h2><strong>Seu Perfil</strong></h2>
<br>
<h4><strong>Clique nos campos desejados para alterar seus dados</strong></h4>
<br>
<div class="col-md-8">
	<div>
  		<form>
  			<div class="form-group">
  				<label for="name">Nome:</label>
  				<input class="form-control" id="name" placeholder="Giselle da Silva Sauro">
  			</div>
  			<div class="form-group">
  				<label for="email">E-mail:</label>
  				<input type="email" class="form-control" id="email" placeholder="gss@icomp.ufam.edu.br">
  			</div>
  			<div class="form-group">
  				<label for="login">Login:</label>
  				<input class="form-control" id="login" placeholder="Gisa187">
  			</div>
  			<div class="form-group">
  				<label for="pwd">Nova Senha:</label>
  				<input type="password" class="form-control" id="pwd" placeholder="**************">
  			</div>
  			<div class="form-group">
  				<label for="pwd">Repetir Nova Senha:</label>
  				<input type="password" class="form-control" id="pwd" placeholder="**************">
  			</div>
  			<div class="form-group">
  				<label for="pwd">Antiga Senha:</label>
  				<input type="password" class="form-control" id="pwd" placeholder="**************">
  			</div>
  		</form>
  	</div>					
</div>
  	  	
