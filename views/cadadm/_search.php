<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CadadmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cadadm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'senha') ?>

    <?= $form->field($model, 'ativo') ?>

    <?php // echo $form->field($model, 'identificadorPessoa') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
