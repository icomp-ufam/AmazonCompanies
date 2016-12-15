<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agregado */

$this->title = 'Create Agregado';
$this->params['breadcrumbs'][] = ['label' => 'Agregados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agregado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
