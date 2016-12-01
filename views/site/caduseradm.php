<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */



$this->title = 'Cadastrar Usuário';

?>

<h2><strong>Cadastro de Usuários</strong></h2>
<br>
<h4><strong>Escolha o perfil e insira os dados solicitados</strong></h4>
<br>
<div class="col-md-8">
	<ul class="nav nav-tabs">
  		<li class="active"><a data-toggle="tab" href="#adm">Administrador</a></li>
  		<li><a data-toggle="tab" href="#aluno">Aluno</a></li>
  		<li><a data-toggle="tab" href="#emp">Empresa</a></li>
  		
	</ul>
	<br>
	<div class="tab-content">
  		<div id="aluno" class="tab-pane fade in active">
  			<div>
  				<form>
  				<div class="form-group">
  					<label for="name">Nome:</label>
  						<input class="form-control" id="name">
  				</div>
  				<div class="form-group">
  					<label for="email">E-mail:</label>
  					<input type="email" class="form-control" id="email">
  				</div>
  				<div class="form-group">
  					<label for="login">Login:</label>
  					<input class="form-control" id="login">
  				</div>
  				<div class="form-group">
  					<label for="pwd">Senha:</label>
  					<input type="password" class="form-control" id="pwd">
  				</div>
  				</form>
  			</div>					
  	  	</div>
  	  	<div id="emp" class="tab-pane fade">
  			<div>
  				<form>
  				<div class="form-group">
  					<label for="name">Nome:</label>
  					<input class="form-control" id="name">
  				</div>
  										
  				<div class="form-group">
  					<label for="name">Tipo de Empresa:</label>
  					<input type="radio" id="nacional">Nacional
					<input type="radio" id="local">Local
					<input type="radio" id="estrangeira">Estrangeira
  				</div>						
  				<div class="form-group">
  					<label for="email">E-mail:</label>
  					<input type="email" class="form-control" id="email">
  				</div>
  				<div class="form-group">
  					<label for="login">Login:</label>
  					<input class="form-control" id="login">
  				</div>
  				<div class="form-group">
  					<label for="pwd">Senha:</label>
  					<input type="password" class="form-control" id="pwd">
  				</div>
  				</form>
  			</div>					
  	  	</div>
  	  	<div id="adm" class="tab-pane fade">
  			<div>
  				<form>
  				<div class="form-group">
  					<label for="name">Nome:</label>
  						<input class="form-control" id="name">
  				</div>
  				<div class="form-group">
  					<label for="email">E-mail:</label>
  					<input type="email" class="form-control" id="email">
  				</div>
  				<div class="form-group">
  					<label for="login">Login:</label>
  					<input class="form-control" id="login">
  				</div>
  				<div class="form-group">
  					<label for="pwd">Senha:</label>
  					<input type="password" class="form-control" id="pwd">
  				</div>
  				</form>
  			</div>					
  	  	</div>
	</div>
	<button type="button" class="btn btn-primary">OK</button>		
</div>
