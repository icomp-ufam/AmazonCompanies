<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idConta') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'idDemonstracao') ?>

    <?= $form->field($model, 'formato') ?>

    <?= $form->field($model, 'pai') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
