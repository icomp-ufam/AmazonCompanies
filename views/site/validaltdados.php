<?php

/* @var $this yii\web\View */

$this->title = 'Validar Alterações de Dados';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  
	<div class="container">
   		<h2><strong>Validar Alterações de Dados</strong></h2>
   		<br>
   		
    		<!-- DROPDOWN -->
  			<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  			
  			<strong>Total: 3 Alterações</strong>
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
        			<th>Empresa</th>
        			<th>Ano</th>
        			<th>Opções</th>
      			</tr>
    			</thead>
    		<tbody>
      			<tr class="danger">
        			<td>Giselle da Silva Sauro</td>
        			<td>Banco do Brasil S.A</td>
        			<td>2015</td>
        			<td><input value= "Visualizar Alterações" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Alterações'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Alterações'; }"/></td>
      			</tr>
      			<tr class="success">
        			<td>Antony Garotinho Brincante</td>
        			<td>Casas Bahia LTDA</td>
        			<td>2013</td>
        			<td><input value= "Visualizar Alterações" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Alterações'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Alterações'; }"/></td>
      			</tr>
      			<tr class="danger">
        			<td>Nicolas Thompson</td>
        			<td>Teewa</td>
        			<td>2016</td>
        			<td><input value= "Visualizar Alterações" class="btn btn-default" type="button" onclick="if (document.getElementById('analise') .style.display=='none') {document.getElementById('analise').style.display=''; this.innerText = ''; this.value = 'Esconder Alterações'; } else { document.getElementById('analise') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Alterações'; }"/></td>
      			</tr>
    		</tbody>
  		</table>
  		<br>
  		
  	<div class="col-md-12" id="analise" style="display:none"> 
  		<ul class="nav nav-tabs">
  			<li class="active"><a data-toggle="tab" href="#demox">Balanço Patrimonial</a></li>
  			<li><a data-toggle="tab" href="#demoy">Demonstração dos Fluxos de Caixa</a></li>
  			<li><a data-toggle="tab" href="#demoz">Demonstração do Resultado do Exercício</a></li>
  			<li><a data-toggle="tab" href="#demov">Índice</a></li>
		</ul>


		<div class="tab-content">
  			<div id="demox" class="tab-pane fade in active">
    			<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Ativo Circulante Financeiro</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 31.647.000,00</textarea></td>
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Disponibilidades</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 31.647.000,00</textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Ativo Circulante Operacional</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 771.547.000,00</textarea></td>
        							       							
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="demoy" class="tab-pane fade">
    				<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
      								
        							<td><textarea class="form-control" rows="1">Depreciação e Amortização</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 7.529.000,00</textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Provisões e Atualizações para demandas Judiciais e Administrativas</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 14.375.000,00</textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Ajuste a Valor Presente</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ -3.057.000,00</textarea></td>
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="demoz" class="tab-pane fade">
    				<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">           
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Receita Líquida de Vendas</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 814.175.000,00</textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Custo dos Produtos</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ -764.866.000,00</textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1">Lucro Bruto</textarea></td>
        							<td><textarea class="form-control" rows="1">R$ 49.309.000,00</textarea></td>
  
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="demov" class="tab-pane fade">
    			<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
  							<thead><tr>
  								<th>Listar Aqui os Indices</th>
      							</tr>
      						</thead>
  						</table>				
  					</div>
			</div>
			</div>
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