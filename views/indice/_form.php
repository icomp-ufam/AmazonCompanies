<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Conta;
use \app\models\Indice;
use \app\models\TipoIndice;

use kartik\widgets\Select2;
    use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Indice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indice-form">

    <?php
        $indices = TipoIndice::find()->select('*')->all();
        $i=1;
        foreach ($indices as $indice) {
            $field[$i] = $indice->nome;
            $i++;
        }
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeIndice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idTipo_Indice')->dropdownList($field)->label('Tipo do Índice:')?>

    <?= $form->field($model, 'formula')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastrar Índice') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="application/javascript">
        function getIdSelect($element){
            console.log('entrou');
            console.log($element);
            $.ajax({
                        url: '<?php echo Url::to(['indice/cadastrar_indice']);?>',
                        type:'POST',
                        data: {
                            'idSelect': $element
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });
        }

 </script>
<!-- <div>
    <button id="barra" type="button" onclick="" class="btn btn-default">(</button>

    <button type="button" onclick="" class="btn btn-default">+</button>


    <button type="button" onclick="" class="btn btn-default">-</button>


    <button type="button" onclick="" class="btn btn-default">*</button>
    <button type="button" onclick="" class="btn btn-default">/</button>


    <button type="button" onclick="" class="btn btn-default">)</button>

</div> -->
<br>
<!-- <?php 
$categorias['+'] = '+';
$categorias['-'] = '-';
$categorias['/'] = '/';
$categorias['*'] = '*';


        foreach($conta as $cont){

            $categorias[$cont->nome]=$cont->nome;

        }

echo Select2::widget([
    'class' => 'js-example-basic-multiple',
    'name' => 'color_2',
    'data' => $categorias,
    'maintainOrder' => true,
    'options' => [
	    'class'=>'col-md-3',
	    'id'=>'id_select',
	    'placeholder' => 'Crie a fórmula...', 
	    'multiple' => true
	],
    'pluginOptions' => [
        'tags' => true,
        'maximumInputLength' => 10
    ],
]);
?> -->
<br>
<!-- <div>
    <button type="button" onclick="getIdSelect($('#id_select').val())" class="btn btn-default">Create Indice</button>

</div>
 -->