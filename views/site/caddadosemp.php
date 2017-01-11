<?php

/* @var $this yii\web\View */

$this->title = 'Cadastrar Dados de Empresa';

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h2><strong>Cadastrar Dados de Empresa</strong></h2>

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
  <br>
  <div class="col-md-8">
  <button class="btn btn-default" type="button">Selecione o arquivo</button>
  <div style="color:#999;">
        Caro usuário, o arquivo a ser enviado deve ser do tipo <strong>*.xlsx</strong>
   </div>
    </div>
  <br>
  </div>
  <br>
  <br>
  <br>
  <br>
  
  <div class="col-md-12">
 <ul class="nav nav-tabs">
  			<li data-toggle="tab" class="active"><a  href="#demox">Balanço Patrimonial</a></li>
  			<li><a data-toggle="tab" href="#demoy">Demonstração dos Fluxos de Caixa</a></li>
  			<li><a data-toggle="tab" href="#demoz">Demonstração do Resultado do Exercício</a></li>
            <li><a data-toggle="tab" href="#indic">Índices</a></li>
  
		</ul>


		<div class="tab-content">
  			<div id="demox" class="tab-pane fade in active">
    			<!-- Inicio da tabela dentro das tabs -->
    				<div class="container">            
  						<table class="table table-hover">
    						<thead>
      							<tr>
      								<th></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							       							
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
      								<th></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
      								
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
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
      								<th></th>
        							<th>Nome Conta</th>
        							<th>Valor</th>
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							
      							</tr>
      							<tr>
      								<td><input type="checkbox"/></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
        							<td><textarea class="form-control" rows="1"></textarea></td>
  
      							</tr>
    						</tbody>
  						</table>
					</div>
					<!-- Final da tabela dentro da tab -->
  			</div>

            <div id="indic" class="tab-pane fade in active">
                <!-- Inicio da tabela dentro das tabs -->
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nome Conta</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>

                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>
                            <td><textarea class="form-control" rows="1"></textarea></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Final da tabela dentro da tab -->
            </div>
  		
			</div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-default" type="button">Excluir Linhas Selecionadas</button>
     	 		<button class="btn btn-default" type="button">Validar Dados</button>
  			</div>
</body>






