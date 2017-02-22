<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaConta */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Empresa Conta',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empresa Contas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empresa-conta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
