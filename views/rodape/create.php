<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rodape */

$this->title = Yii::t('app', 'Create Rodape');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rodapes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rodape-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
