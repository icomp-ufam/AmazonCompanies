<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Demonstracao;

/* @var $this yii\web\View */
/* @var $model app\models\Conta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idDemonstracao')->dropDownList(ArrayHelper::map(Demonstracao::find()->all(), 'idDemonstracao', 'nomeDemonstracao'))?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
