<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmpresaConta */

$this->title = Yii::t('app', 'Create Empresa Conta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empresa Contas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-conta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
