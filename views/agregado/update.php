<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agregado */

$this->title = 'Update Agregado: ' . $model->idAgregado;
$this->params['breadcrumbs'][] = ['label' => 'Agregados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAgregado, 'url' => ['view', 'id' => $model->idAgregado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agregado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
