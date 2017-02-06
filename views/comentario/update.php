<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Comentario',
]) . $model->idComentario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comentarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idComentario, 'url' => ['view', 'id' => $model->idComentario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="comentario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
