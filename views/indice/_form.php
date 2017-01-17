<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Conta;

/* @var $this yii\web\View */
/* @var $model app\models\Indice */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="indice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeIndice')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastrar Índice') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
