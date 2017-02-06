<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

// $this->title = Yii::t('app', 'Create Comentario';
$this->title = 'Submeter Comentario';
$this->params['breadcrumbs'][] = ['label' => 'Comentario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$idEmpresa = $_GET['idEmpresa'];
$Comentario_idComentario = $_GET['Comentario_idComentario'];
?>
<div class="comentario-create">

    <h1></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idEmpresa' => $idEmpresa,
        'Comentario_idComentario' => $Comentario_idComentario,
    ]) ?>

</div>