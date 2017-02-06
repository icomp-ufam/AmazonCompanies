<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Demonstracao */

$this->title = Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Demonstração',
]) . $model->idDemonstracao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Demonstrações'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDemonstracao, 'url' => ['view', 'id' => $model->idDemonstracao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Alterar');
?>
<div class="demonstracao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
