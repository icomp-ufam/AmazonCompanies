<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacao */

$this->title = $model->idNotificacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notificacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Tem certeza de que deseja excluir este item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idNotificacao',
            'Usuario_idUsuario',
            'status',
            'conteudo:ntext',
            'tipo',
        ],
    ]) ?>

</div>
