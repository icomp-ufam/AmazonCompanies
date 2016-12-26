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
<body>

  <div class="site-index" >
    </br></br></br></br></br></br>
    <p style="text-align: center; font-size: large;">Não se esqueça de <strong>sempre</strong> ver sua barra de notificações a fim de acompanhar eventos importantes!</p>
    <p style="text-align: center; font-size: large;">Para criar uma empresa ou ver as que já existem, vá para a aba <strong>Empresas</strong> e procure por uma empresa.</p>
   <p style="text-align: center; font-size: large;">Para criar um usuário ou ver os que já existem, vá para a aba <strong>Usuários</strong> e procure por uma empresa.</p>
   <p style="text-align: center; font-size: large;">Abaixo estão os <strong>comentários</strong> que esperam a sua revisão ;D</p>

</body>
	<div class="container">
   		<h2><strong>Comentários</strong></h2>
    		<!-- DROPDOWN -->
  			<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  			Classificar por:
  			<div class="dropdown">			
    			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filtrar
    			<span class="caret"></span></button>
    			<ul class="dropdown-menu">
      				<li><a href="#">Mais Antigos</a></li>
      				<li><a href="#">Mais Recentes</a></li>
    			</ul>
  			</div>

  		<table class="table table-striped">
    		<thead>
      			<tr>
        			<th>Comentário</th>
        			<th>Usuário</th>
      			</tr>
    			</thead>
    		<tbody>
      			<tr>
        			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                   dolore magna aliqua</td>
        			<td>Giselle</td>
        			<td><button class="btn btn-default" type="button">Responder</button></td>
        			<td><button class="btn btn-default" type="button">Excluir</button></td>
      			</tr>
      			<tr>
        			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td>
        			<td>Nick</td>
        			<td><button class="btn btn-default" type="button">Responder</button></td>
        			<td><button class="btn btn-default" type="button">Excluir</button></td>
      			</tr>
      			<tr>
        			<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td>
        			<td>André</td>
        			<td><button class="btn btn-default" type="button">Responder</button></td>
     	 			<td><button class="btn btn-default" type="button">Excluir</button></td>
     	 		</tr>
    		</tbody>
  		</table>
      <strong>3 Comentários </strong>
	</div>
        
        <br>  

      </div> 

    </div>
    </div>

</body>






