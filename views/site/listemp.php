<?php

/* @var $this yii\web\View */

$this->title = 'Lista de Empresas';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  
	<div class="container">
   		<h2><strong>Lista de Empresas Cadastradas</strong></h2>
  		<br>
  			<div class="row">
 	<div class="col-md-4">
  		<!-- DROPDOWN -->
  		<div class="container">
  			<div class="dropdown">
    			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tipo de Empresa
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
      				<li><a href="#">Local</a></li>
      				<li><a href="#">Nacional</a></li>
      				<li><a href="#">Estrangeira</a></li>
    			</ul>
  			</div>
		</div>
  	</div>
  
  	
  <div class="col-md-4">
  	 <div class="input-group">
      	<span class="input-group-btn">
        	<button class="btn btn-default glyphicon glyphicon-search" type="button"></button>
      	</span>
	  
      <input type="text" class="form-control glyphicon" placeholder="Nome da Empresa">
      
    </div><!-- /input-group -->
  </div>
  
  <div class="col-md-4">
  	<!-- DROPDOWN -->
  		<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		<div class="container">
  			<div class="dropdown">
    			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Ano
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
      				<li><a href="#">2014</a></li>
      				<li><a href="#">2015</a></li>
      				<li><a href="#">2016</a></li>
    			</ul>
  			</div>
  		</div>
  </div>
  </div>
  			
  			<br>       
  		<table class="table table-bordered">
    		<thead>
      			<tr>
      				<th><input type="checkbox"/></th>
        			<th>Nome</th>
        			<th>E-mail</th>
        			<th>Tipo</th>
      			</tr>
    			</thead>
    		<tbody>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Banco do Brasil S.A</td>
        			<td>bb@bol.com</td>
        			<td>Nacional</td>
        			

      			</tr>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Silvio Santos S.A</td>
        			<td>sbt@uol.com.br</td>
        			<td>Nacional</td>
        			
      			</tr>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Nicolas Thompson</td>
        			<td>ntfs@icomp.ufam.edu.br</td>
        			<td>Local</td>
        			
      			</tr>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Moto Honda LTDA</td>
        			<td>biz@gmail.com</td>
        			<td>Nacional</td>
        			
      			</tr>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Pastelaria do Arruda</td>
        			<td>pas@hotmail.com</td>
        			<td>Local</td>
        			
      			</tr>
      			<tr>
      				<td><input type="checkbox"/></td>
        			<td>Monster's Academy</td>
        			<td>birl@gmail.com</td>
        			<td>Estrangeira</td>
        			
      			</tr>
    		</tbody>
  		</table>
  		
  		<button class="btn btn-default">Baixar Dados da Empresa</button>
	</div>
   
</body>