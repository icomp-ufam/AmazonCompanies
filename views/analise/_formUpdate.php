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

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false)//hiddenInput(['value'=>'Pendente']) ?>

    <?= $form->field($model, 'idEmpresa')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'textoAnalisador')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submeter' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    
    <?php ActiveForm::end(); ?>

</div>
