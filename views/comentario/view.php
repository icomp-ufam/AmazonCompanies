<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$idComentário = $_GET['id'];
$idEmpresa = $_GET['idEmpresa'];

?>
<div class="comentario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="comentario" class="row">

        <div class="title-body">
            <h3><strong>Comentário</strong></h3>
        </div>
         <div class="col-md-8" style="background-color: #F8F8FF; float: left">
         		<?= $model->conteudo ?>
        </div>

        <div style="float: right">
        	<link href="css/bootstrap.min.css" rel="stylesheet"> 
        	<link href="css/docs.min.css" rel="stylesheet">

        <?= Html::a('<span class="glyphicon glyphicon-remove" aria-hidden=true> </span>
                     <span class=glyphicon-class> Apagar Comentário</span>',
                      ['delete', 'id' => $idComentário], [
                       'class' => 'btn btn-danger',
                       'data' => [
                       'method' => 'post',
         ],]) ?>
        </div>

    </div>
    	

</div>


 