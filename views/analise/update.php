<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Analise */

$this->title = 'Update Analise: ' . $model->idanalise;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idanalise, 'url' => ['view', 'id' => $model->idanalise]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="analise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
