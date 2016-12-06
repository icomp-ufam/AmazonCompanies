<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDemonstracao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-demonstracao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
