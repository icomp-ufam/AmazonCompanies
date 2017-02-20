<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notificacao */

$this->title = Yii::t('app', 'Enviar Notificação');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notificacaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$Usuario_idUsuario = $_GET['Usuario_idUsuario'];
$idAnalise = $_GET['idAnalise'];
?>
<div class="notificacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    	'Usuario_idUsuario' => $Usuario_idUsuario,
    	'idAnalise'=> $idAnalise,
        'model' => $model,
    ]) ?>

</div>
