<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoIndice */

$this->title = Yii::t('app', 'Create Tipo Indice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Indices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-indice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
