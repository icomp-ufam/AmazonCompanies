<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">


    <?php
<<<<<<< HEAD
        $tipoEmpresa =  Array('prompt' => 'Selecione...', 'Local'=>'Local','Nacional'=>'Nacional','Estrangeira'=> 'Estrangeira');
        $form = ActiveForm::begin();
=======
        $tipoEmpresa =  Array('Local'=>'Local','Nacional'=>'Nacional','Estrangeira'=> 'Estrangeira');

        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
>>>>>>> 447bd2c980b4d38fa01d26298fd3aa13f99e8fe6
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'fonte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->dropDownList($tipoEmpresa) ?>

    <?= $form->field($model, 'logotipo')->fileInput(['maxlength' => true])?>
    <?php
        //echo FileInput::widget([
          //  'name' => 'logotipo',
            //]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>












