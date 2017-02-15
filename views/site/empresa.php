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



</body>






