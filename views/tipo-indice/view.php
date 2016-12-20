<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoIndice */

$this->title = $model->idTipo_indice;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Indices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-indice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idTipo_indice], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idTipo_indice], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTipo_indice',
            'nome',
        ],
    ]) ?>

</div>