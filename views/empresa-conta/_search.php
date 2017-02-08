<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaContaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-conta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'idEmpresa0.nome') ?>

    <?= $form->field($model, 'idConta') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <?php // echo $form->field($model, 'statusValidacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
