<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Analise */

$this->title = $model->idanalise;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idanalise], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idanalise], [
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
            'idanalise',
            'texto:ntext',
            'status',
            'idEmpresa',
        ],
    ]) ?>

</div>
