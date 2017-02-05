<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\cadadm */

$this->title = $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Cadadms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadadm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUsuario',
            'login',
            'nome',
            'senha',
            'ativo',
            'identificadorPessoa',
            'email:email',
        ],
    ]) ?>

</div>
