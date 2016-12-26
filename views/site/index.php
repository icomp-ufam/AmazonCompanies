<?php

/* @var $this yii\web\View */

use app\models\User;

  $this->title = 'Amazon Companies';
  if (Yii::$app->user->getIsGuest()){
    echo '<h1>Bem Vindo, Visitante!</h1>';
  } else{
    $username = Yii::$app->user->identity->nome;
    echo '<h1>Bem Vindo, ' . $username . '!</h1>';
    if(Yii::$app->user->getIdentificadorPessoa() == '1'){
      $this->render('/site/adm');
    }
  }
  
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div class="site-index" >
    </br></br></br></br></br></br></br>
    <p style="text-align: center; font-size: large;">Primeiramente, seja bem vindo ao Amazon Companies!</p>
    <p style="text-align: center; font-size: large;">Para começar, vá para a aba <strong>Empresas</strong> e procure por uma empresa.</p>
    <p style="text-align: center; font-size: large;">Se desejar, pode entrar em contato conosco entrando na aba <strong>Contato</strong></p>
  </div>

</body>