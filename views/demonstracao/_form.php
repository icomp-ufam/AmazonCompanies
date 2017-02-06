<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Demonstracao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demonstracao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeDemonstracao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Criar') : Yii::t('app', 'Alterar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

