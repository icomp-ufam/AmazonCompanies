<?php

/* @var $this yii\web\View */

$this->title = 'Amazon Companies';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>

<body>

<?php 

if (Yii::$app->user->getIsGuest()){
	echo '<h1>Bem Vindo, Visitante!</h1>';
}else{
	$username = Yii::$app->user->identity->nome;
	echo '<h1>Bem Vindo, ' . $username . '!</h1>';
}

?>
<!-- Para aparecer a janela ao passar o mouse encima -->
<script type="text/javascript" src="wz_tooltip.js"></script>


<div class="site-index">

   
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
  <h4>A tabela abaixo só deverá aparecer após os filtros acima serem acionados</h4>
	<br>
	

    <div class="body-content">
    	<p>Site da empresa: www.google.com.br</p> 
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
        							<td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Ativo Circulante Financeiro</td>
        							<td>R$ 31.647.000,00</td>
      							</tr>
      							<tr>
      								<td><input type="checkbox" /></td>
        							<td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Disponibilidades</td>
        							<td>R$ 31.647.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox" /></td>
        							<td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Ativo Circulante Operacional</td>
        							<td>R$ 771.547.000,00</td>
        							
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
        							<td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Depreciação e Amortização</td>
        							<td>R$ 7.529.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Provisões e Atualizações para demandas Judiciais e Administrativas</td>
        							<td>R$ 14.375.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Ajuste a Valor Presente</td>
        							<td>R$ -3.057.000,00</td>
        							
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
        							<td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Receita Líquida de Vendas</td>
        							<td>R$ 814.175.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Custo dos Produtos</td>
        							<td>R$ -764.866.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Lucro Bruto</td>
        							<td>R$ 49.309.000,00</td>
        							
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="demov" class="tab-pane fade">
    			<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<ul class="nav nav-tabs">
  			<li class="active"><a data-toggle="tab" href="#indicex">Liquidez</a></li>
  			<li><a data-toggle="tab" href="#indicey">Endividamento</a></li>
  			<li><a data-toggle="tab" href="#indicez">Lucratividade</a></li>
  			<li><a data-toggle="tab" href="#indicev">Rentabilidade</a></li>
			<li><a data-toggle="tab" href="#indicev">Giros e Prazos</a></li>
			<li><a data-toggle="tab" href="#indicev">Giros Assaf Neto</a></li>
			<li><a data-toggle="tab" href="#indicev">Giros Viaconti</a></li>
		</ul>


		<div class="tab-content">
  			<div id="indicex" class="tab-pane fade in active">
    			<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Agregados</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('Ex: Lucro Gerado = (Ativos Totais/Passivo Exigível)')" onmouseout = "UnTip()">LG = (AT/PE)</td>
        							<td>R$ 31.647.000,00</td>
      							</tr>
      							<tr>
      								<td><input type="checkbox" /></td>
        							<td onmouseover="Tip('Ex: Lucro Contínuo = (Ativos Circulantes/Passivos Circulantes)')" onmouseout = "UnTip()">LC = (AC/PC)</td>
        							<td>R$ 31.647.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox" /></td>
        							<td onmouseover="Tip('Ex: Lucro Significativo = (Ativos Circulantes - Estoques)/Passivos Circulantes')" onmouseout = "UnTip()">LS = (AC-Estoques)/PC</td>
        							<td>R$ 771.547.000,00</td>
        							
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="indicey" class="tab-pane fade">
    				<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Agregados</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">EG = PE/PT</td>
        							<td>R$ 7.529.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">RCT = PE/PL</td>
        							<td>R$ 14.375.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">ED = PC/PNC</td>
        							<td>R$ -3.057.000,00</td>
        							
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>
  			<div id="indicez" class="tab-pane fade">
    				<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">           
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Agregados</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">MB = LB/VL</td>
        							<td>R$ 814.175.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">MO = LO/VL</td>
        							<td>R$ -764.866.000,00</td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">ML = LL/VL</td>
        							<td>R$ 49.309.000,00</td>
        							
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>				
  					</div>
			</div>
			</div>
		<div class="row">	
			<div class="col-md-3">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#cadAgrega">Cadastrar Agregado</button>	
  			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#cadIndice">Cadastrar Índice</button>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#gerenTipInd">Gerenciar Tipos de Índice</button>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#gerenTipDemo">Gerenciar Tipos de Demonstração</button>
			</div>
		</div>
		<br>
			
			<div class="modal" id="cadAgrega" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Cadastrar Agregado</h3>
        				</div>
        				<div class="modal-body">	
        					<form class="form-inline" role="form">
        						<div class="form-group">
  									<label for="sigla">Sigla:</label>
  									<input class="form-control" id="sigla" placeholder="AC" style="max-width:60px">
  									<label for = "representa"> Representação:</label>
  									<input class="form-control" id="representa" placeholder="Ativos Contínuos" style="min-width:300px">
  								</div>
        					</form>
        				</div>
        				<div class="modal-footer">
          					<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        				</div>
      				</div>
    			</div>
  			</div>
			<div class="modal" id="cadIndice" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Cadastrar Índice</h3>
        				</div>
        				<div class="modal-body">	
        					<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Índice</th>
        							<th>Fórmula</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td>Liquidez</td>
        							<td><input class="form-control" placeholder="LG = AT/PE"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td>Endividamento</td>
        							<td><input class="form-control" placeholder="RCT = PE/PL"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td>Lucratividade</td>
        							<td><input class="form-control" placeholder="ML = LL/VL"></td>
      							</tr>
    						</tbody>
  						</table>
  						
  						<table class="table table-hover" id="agregatab" style="display:none">
    						<thead>
      							<tr>
      								
        							<th>Sigla</th>
        							<th>Nome</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								
        							<td>LG</td>
        							<td>Lucro Gerado</td>
      							</tr>
      							<tr>
      								
        							<td>AC</td>
        							<td>Ativos Contínuos</td>
        							
      							</tr>
      							<tr>
      								
        							<td>PC</td>
        							<td>Passivos Circulantes</td>
        							       							
      							</tr>
    						</tbody>
  						</table>
  						
        				</div>
        				<div class="modal-footer">
        					<form class="form-inline" role="form">
        						<input value="Visualizar Agregados" type="button" class="btn btn-default" onclick="if (document.getElementById('agregatab') .style.display=='none') {document.getElementById('agregatab').style.display=''; this.innerText = ''; this.value = 'Esconder Agregados'; } else { document.getElementById('agregatab') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Agregados'; }">
          						<button type="button" class="btn btn-default">Apagar Seleção</button>
          						<button type="button" class="btn btn-default">Adicionar Nova Formula</button>
          						<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        					</form>
        				</div>
      				</div>
    			</div>
  			</div>
  			<div class="modal" id="gerenTipInd" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Gerenciar Tipos de Índice</h3>
        				</div>
        				<div class="modal-body">	
        					<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Índice Cadastrados</th>
        							
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							
        							<td><input class="form-control" placeholder="Endividamento"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							
        							<td><input class="form-control" placeholder="Liquidez"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><input class="form-control" placeholder="Lucratividade"></td>
      							</tr>
    						</tbody>
  						</table>
  				
        				</div>
        				<div class="modal-footer">
          					<form class="form-inline" role="form">
          						<button type="button" class="btn btn-default">Apagar Seleção</button>
          						<button type="button" class="btn btn-default">Adicionar Nova Formula</button>
          						<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        					</form>
        				</div>
      				</div>
    			</div>
  			</div>
			<div class="modal" id="gerenTipDemo" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Gerenciar Tipos de Demonstração</h3>
        				</div>
        				<div class="modal-body">	
        					<table class="table table-hover">
    						<thead>
      							<tr>
      								<th><input type="checkbox"/></th>
        							<th>Demonstrações Cadastradas</th>
        							
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							
        							<td><input class="form-control" placeholder="Balanço Patrimonial"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							
        							<td><input class="form-control" placeholder="Demonstração dos Fluxos de Caixa"></td>
        							
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><input class="form-control" placeholder="Demonstração do Resultado do Exercício"></td>
      							</tr>
    						</tbody>
  						</table>
  				
        				</div>
        				<div class="modal-footer">
          					<form class="form-inline" role="form">
          						<button type="button" class="btn btn-default">Apagar Seleção</button>
          						<button type="button" class="btn btn-default">Adicionar Nova Demonstração</button>
          						<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
        					</form>
        				</div>
      				</div>
    			</div>
  			</div>
  			
			
			
		<h4>Gráfico, Download e Análise serão de acordo com as linhas selecionadas da tabela acima</h4>
		<br>
		
		
		<!-- BOTOES -->
	<div class="row">
		<div class="col-md-4">
  	 		<button type="button" class="btn btn-default">Download</button>	
  		</div>
  		
  		<div class="col-md-4">
  	 		<div><input value="Visualizar Gráfico" type="button" class="btn btn-default" onclick="if (document.getElementById('grafico') .style.display=='none') {document.getElementById('grafico').style.display=''; this.innerText = ''; this.value = 'Esconder Gráfico'; } else { document.getElementById('grafico') .style.display='none'; this.innerText = ''; this.value = 'Visualizar Gráfico'; }">
  			</div>
  		</div>
  		
  		<div class="col-md-4">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#submet">Submeter Nova Análise</button>	
  		</div>
  	
  		<div class="modal" id="submet" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h3 class="modal-title">Submeter Análise</h3>
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
  		<!-- COM MODAL
		<div class="col-sm-4">
  	 		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Grafico">Gerar Gráfico</button>	
  		</div>
  			
     	 
  			<div class="modal" id="Grafico" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h4 class="modal-title">Gráfico</h4>
        				</div>
        				<div class="modal-body">
          					<p>Some text in the modal.</p>
        				</div>
        				<div class="modal-footer">
          					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				</div>
      				</div>
    			</div>
  			</div>-->
  			
  	</div>	
		
		
		
	<img src="grafico.png" id="grafico" class="img-thumbnail col-md-12" style="display:none">
	
	<br><br>	
	Análise:<textarea id="analise" class="form-control col-md-12-offset-6" rows="6" readonly>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur!
	</textarea>
  
   
  	
  	
   <br>
   <br>
   <br>
	
      </div> 

    </div>
    </div>

</body>






