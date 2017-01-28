<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacao */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Notificacao',
]) . $model->idNotificacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notificacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNotificacao, 'url' => ['view', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="notificacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
