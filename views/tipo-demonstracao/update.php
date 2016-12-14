<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDemonstracao */

$this->title = 'Update Tipo Demonstracao: ' . $model->idTipo_Demonstracao;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Demonstracaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipo_Demonstracao, 'url' => ['view', 'id' => $model->idTipo_Demonstracao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-demonstracao-update">

    <h3>Atualizar</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
