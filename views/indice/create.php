<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indice */

$this->title = Yii::t('app', 'Cadastrar Índice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Indices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indice-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
    	'ContaSearchModel' => $ContaSearchModel,
    	'ContaDataProvider' => $ContaDataProvider,
        'model' => $model,
        'conta' => $conta,
    ]) ?>

</div>