<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Analise */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="assets/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<div class="analise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'investidor')->dropdownList([
                            'prompt' => 'Selecione...',
                            2 => 'Comprar',
                            3 => 'Vender', 
                            4 => 'Neutro'
                    ])->label('Tendencias para o investidor:')?>

    <?= $form->field($model, 'credor')->dropdownList([
                            'prompt' => 'Selecione...',
                            2 => 'Emprestar',
                            3 => 'Não emprestar'
                    ])->label('Tendencias para o credor:')?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ano')->textInput(['maxlength' => true])->hint('Ex: 2017') ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>'2'])->label(false);//hiddenInput(['value'=>'Pendente']) ?>

    <?= $form->field($model, 'idEmpresa')->hiddenInput(['value'=>$idEmpresa])->label(false); ?>

    <?= $form->field($model, 'textoAnalisador')->hiddenInput(['value'=>null])->label(false); ?>

    <?= $form->field($model, 'Usuario_idUsuario')->hiddenInput(['value'=>$Usuario_idUsuario])->label(false); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submeter' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
