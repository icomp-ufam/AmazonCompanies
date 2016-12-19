<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agregado */

$this->title = $model->idAgregado;
$this->params['breadcrumbs'][] = ['label' => 'Agregados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agregado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idAgregado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idAgregado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAgregado',
            'nome',
            'sigla',
        ],
    ]) ?>

</div>
