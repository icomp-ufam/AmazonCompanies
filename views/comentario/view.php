<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

// $this->title = $model->idEmpresa0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="comentario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="comentario" class="row">

        <div class="title-body">
            <h3><strong>Comentário</strong></h3>
        </div>
         <div class="col-md-8" style="background-color: lavender">
             <?= $model->conteudo ?>
        </div>

    </div>
</div>
