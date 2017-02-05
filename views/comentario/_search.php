<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComentarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idComentario') ?>

    <?= $form->field($model, 'conteudo') ?>

    <?= $form->field($model, 'Empresa_idEmpresa') ?>

    <?= $form->field($model, 'Usuario_idUsuario') ?>

    <?= $form->field($model, 'Comentario_idComentario') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
