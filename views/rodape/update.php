<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rodape */

$this->title = Yii::t('app', 'Alteração do {modelClass}: ', [
    'modelClass' => 'Link',
]) . $model->link;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rodapes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->link, 'url' => ['view', 'id' => $model->link]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="rodape-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
