<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\cadadm */

$this->title = 'Update Cadadm: ' . $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Cadadms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUsuario, 'url' => ['view', 'id' => $model->idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cadadm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
