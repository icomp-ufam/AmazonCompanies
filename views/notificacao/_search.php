<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NotificacaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notificacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNotificacao') ?>

    <?= $form->field($model, 'Usuario_idUsuario') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'conteudo') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'idAnalise') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
