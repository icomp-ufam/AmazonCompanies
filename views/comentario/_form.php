<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comentario */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- 
<script type="text/javascript" src="assets/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script> -->

<div class="comentario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conteudo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Empresa_idEmpresa')->hiddenInput(['value'=>$idEmpresa])->label(false); ?>

    <?= $form->field($model, 'nome')->hiddenInput(['value'=>'Larissa'])->label(false); ?>

    <?= $form->field($model, 'email')->hiddenInput(['value'=>'llen@icomp.ufam.edu.br'])->label(false); ?>

    <?= $form->field($model, 'data')->hiddenInput(['value'=>date('Y-m-d')])->label(false); ?>

    <?= $form->field($model, 'hora')->hiddenInput(['value'=>time('HH:MM:SS')])->label(false); ?>

    <?= $form->field($model, 'Comentario_idComentario')->hiddenInput(['value'=>$Comentario_idComentario])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Responder' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>