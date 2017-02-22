<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notificacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notificacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Usuario_idUsuario')->hiddenInput(['value'=>$Usuario_idUsuario])->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value' => '0'])->label(false) ?>

    <?= $form->field($model, 'conteudo')->textarea(['rows' => 6]) ?>
	
    <?= $form->field($model, 'tipo')->hiddenInput(['value' => 0])->label(false) // 0 = Analise, 1 = Alteração de Dados, 2 = Outros  ?>
	
    <?= $form->field($model, 'idAnalise')->hiddenInput(['value' => $idAnalise])->label(false) ?>

    <div class="form-group">
    	<?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['analise/index'], ['class' => 'btn btn-danger']) ?>
    </div>
		
    <?php ActiveForm::end(); ?>

</div>
