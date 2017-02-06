<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cadadm */

$this->title = 'Cadastro de Usuários';
//$this->params['breadcrumbs'][] = ['label' => 'Cadadms', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-create">

    <h2><strong>Cadastro de Usuários</strong></h2>
    <h4>Escolha o perfil e insira os dados solicitados<h4/>
	<br>
    
<div class="usuario-form">
	<div class="col-md-4">
    <form id="w0" action="/AmazonCompanies/web/index.php?r=usuario%2Fcreate" method="post">
<input type="hidden" name="_csrf" value="TUtPVUM4djUcZg0gBXApagskIxoobENDdSU6J3BAEl87Ey54dE0yag==">	
	<div class="form-group field-usuario-identificadorpessoa required">
<label class="control-label" for="usuario-identificadorpessoa">Tipo de Usuário</label>
<select id="usuario-identificadorpessoa" class="form-control" name="Usuario[identificadorPessoa]">
<option value="prompt">Selecione...</option>
<option value="2">Aluno</option>
<option value="3">Empresa</option>
</select>

<div class="help-block"></div>
</div>	
    <div class="form-group field-usuario-login required">
<label class="control-label" for="usuario-login">Nome de Usuário</label>
<input type="text" id="usuario-login" class="form-control" name="Usuario[login]" maxlength="45">
<div class="hint-block">Ex: gisa123</div>
<div class="help-block"></div>
</div>
    <div class="form-group field-usuario-nome required">
<label class="control-label" for="usuario-nome">Nome</label>
<input type="text" id="usuario-nome" class="form-control" name="Usuario[nome]" maxlength="45">
<div class="hint-block">Ex: Gisele Almeida</div>
<div class="help-block"></div>
</div>
    <div class="form-group field-usuario-senha required">
<label class="control-label" for="usuario-senha">Senha</label>
<input type="password" id="usuario-senha" class="form-control" name="Usuario[senha]" maxlength="45">

<div class="help-block"></div>
</div>	
	<div class="form-group field-usuario-repetir_senha required">
<label class="control-label" for="usuario-repetir_senha">Repetir Senha</label>
<input type="password" id="usuario-repetir_senha" class="form-control" name="Usuario[repetir_senha]" maxlength="45">

<div class="help-block"></div>
</div>	
    <div class="form-group field-usuario-ativo required">

<input type="hidden" id="usuario-ativo" class="form-control" name="Usuario[ativo]" value="2">

<div class="help-block"></div>
</div>
    <div class="form-group field-usuario-email required">
<label class="control-label" for="usuario-email">E-mail</label>
<input type="text" id="usuario-email" class="form-control" name="Usuario[email]" maxlength="45">
<div class="hint-block">Ex: gii@icomp.ufam.edu.br</div>
<div class="help-block"></div>
</div>
    <div class = "form-group">
               <button type="submit" class="btn btn-success">Enviar Dados</button>  
    	<a class="btn btn-danger" href="/AmazonCompanies/web/index.php?r=site">Cancelar</a>    	  	
    </div>

    </form>	</div>
</div>


</div>
    </div>
</div>
