<?php

/* @var $this yii\web\View */

$this->title = 'Notificações';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>

<body>
  
	<div class="container">
   		<h2><strong>Notificações Recebidas</strong></h2>
   		<br>
   		
    		<!-- DROPDOWN -->
  			<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  			
  			<strong>Total: 3 Notificações</strong>
  			<div class="dropdown">			
    			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filtrar
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
      				<li><a href="#">Análises</a></li>
      				<li><a href="#">Alteração de Dados</a></li>
    			</ul>
  			</div>
  			
  			
  			<br>       
  		<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Notificador</th>
        			<th>Tipo de Notificação</th>
        			<th>Empresa</th>
        			<th>Ano</th>
        			<th>Opções</th>
      			</tr>
    			</thead>
    		<tbody>
      			<tr class="danger">
        			<td>Monitor 1</td>
        			<td>Alteração de Dados</td>
        			<td>Banco do Brasil S.A</td>
        			<td>2015</td>
        			<td><input value= "Visualizar Notificação" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Notificação'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Notificação'; }"/></td>
      			</tr>
      			<tr class="success">
        			<td>Professor André</td>
        			<td>Análise de Empresa</td>
        			<td>Casas Bahia LTDA</td>
        			<td>2013</td>
        			<td><input value= "Visualizar Notificação" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Notificação'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Notificação'; }"/></td>
      			</tr>
      			<tr class="danger">
        			<td>Monitor 2</td>
        			<td>Alteração de Dados</td>
        			<td>Teewa</td>
        			<td>2016</td>
        			<td><input value= "Visualizar Notificação" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Notificação'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Notificação'; }"/></td>
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
		<button class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Notificação'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Notificação'; }">OK</button>
  	
  	</div>
  		
	</div>
   
</body>