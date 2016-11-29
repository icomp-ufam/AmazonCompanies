<?php

/* @var $this yii\web\View */

$this->title = 'Validar Análises';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>

<body>
  
	<div class="container">
   		<h2><strong>Validar Análises</strong></h2>
   		<br>
   		
    		<!-- DROPDOWN -->
  			<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  			
  			<strong>Total: 3 Solicitações</strong>
  			<div class="dropdown">			
    			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filtrar
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
      				<li><a href="#">Pendentes</a></li>
      				<li><a href="#">Validados</a></li>
    			</ul>
  			</div>
  			
  			
  			<br>       
  		<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Nome do Aluno</th>
        			<th>Empresa Analisada</th>
        			<th>Ano</th>
        			<th>Opções</th>
      			</tr>
    			</thead>
    		<tbody>
      			<tr class="danger">
        			<td>Giselle da Silva Sauro</td>
        			<td>Banco do Brasil S.A</td>
        			<td>2015</td>
        			<td><input value= "Visualizar Análise" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Análise'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Análise'; }"/></td>
      			</tr>
      			<tr class="success">
        			<td>Antony Garotinho Brincante</td>
        			<td>Casas Bahia LTDA</td>
        			<td>2013</td>
        			<td><input value= "Visualizar Análise" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Análise'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Análise'; }"/></td>
      			</tr>
      			<tr class="danger">
        			<td>Nicolas Thompson</td>
        			<td>Teewa</td>
        			<td>2016</td>
        			<td><input value= "Visualizar Análise" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Análise'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Análise'; }"/></td>
      			</tr>
    		</tbody>
  		</table>
  		<br>
  		
  	<div class="col-md-12" id="analise" style="display:none"> 
  		<textarea id="analise" class="form-control col-md-12-offset-6" rows="6">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
		</textarea>
		<br>
		<button class="btn btn-default" type="button">Validar</button> <button class="btn btn-default" type="button" data-toggle="modal" data-target="#notificar">Notificar Aluno</button>
  			<div class="modal" id="notificar" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Enviar Notificacao</h3>
        				</div>
        				<div class="modal-body">	
        					<textarea class="form-control" rows="3"></textarea>
        				</div>
        				<div class="modal-footer">
          					<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        				</div>
      				</div>
    			</div>
  			</div>
  	
  	</div>
  		
	</div>
   
</body>