<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->title = $model->idComentario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comentarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Alterar'), ['update', 'idComentario' => $model->idComentario, 'Empresa_idEmpresa' => $model->Empresa_idEmpresa, 'Usuario_idUsuario' => $model->Usuario_idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Apagar'), ['delete', 'idComentario' => $model->idComentario, 'Empresa_idEmpresa' => $model->Empresa_idEmpresa, 'Usuario_idUsuario' => $model->Usuario_idUsuario], [
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
            'idComentario',
            'conteudo:ntext',
            'Empresa_idEmpresa',
            'Usuario_idUsuario',
            'Comentario_idComentario',
        ],
    ]) ?>

</div>
