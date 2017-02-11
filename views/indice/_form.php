<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Conta;
use kartik\widgets\Select2;
    use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Indice */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="indice-form">
<!-- 
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeIndice')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastrar Índice') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

 -->

</div>

<script type="application/javascript">
        //Criar controlador acesado vai requisição ajax."

        function getIdSelect($element){
            console.log('entrou');
            console.log($element);
        // //     var newStateVal = $('#barra').val();
        // //     console.log(newStateVal);
        //              var newState = new Option($element, $element, true, true);
        // 		console.log(newState);
        //  $("#id_select").append(newState).trigger('change');

        //     // $("#id_select").val(newState).trigger('change');
        //     console.log($('#id_select').val());
             //var teste = $("#id_select").select2('val','asp');
            // console.log(teste);
            // var id_select = $('#id_select').val();
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
<div>
    <button id="barra" type="button" onclick="" class="btn btn-default">(</button>

    <button type="button" onclick="" class="btn btn-default">+</button>


    <button type="button" onclick="" class="btn btn-default">-</button>


    <button type="button" onclick="" class="btn btn-default">*</button>
    <button type="button" onclick="" class="btn btn-default">/</button>


    <button type="button" onclick="" class="btn btn-default">)</button>

</div>
<br>
<?php 
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
?>
<br>
<div>
    <button type="button" onclick="getIdSelect($('#id_select').val())" class="btn btn-default">Create Indice</button>

</div>
