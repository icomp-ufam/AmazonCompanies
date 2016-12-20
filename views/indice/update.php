<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Indice',
]) . $model->idIndice;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Indices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idIndice, 'url' => ['view', 'id' => $model->idIndice]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="indice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
