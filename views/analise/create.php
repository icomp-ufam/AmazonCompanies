<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Analise */

$this->title = 'Create Analise';
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
