<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
//use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use app\models\Empresa;
use app\models\EmpresaSearch;
use app\models\EmpresaConta;
use app\models\Conta;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="empresa-index">
    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?php
    if(Yii::$app->user->getIdentificadorPessoa() == '1'){ //Administrador
        ?>
        <?= GridView::widget([
            'id'=>'grid',
            'summary'=>'',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'kartik\grid\CheckboxColumn'],
            	'nome',
                

                [
                    'attribute' => 'Logotipo',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/img/'. $data['logotipo'],
                            ['width' => '30px']);
                    },
                ],
                
                //'analise:ntext',
                'fonte',
                [
                    'attribute' => 'tipo',
                    'hAlign' => 'center',
                    'value' => 'tipo',
                    'filter' => [
                        'Local' => 'Local',
                        'Nacional' => 'Nacional',
                        'Estrangeira' => 'Estrangeira'
                    ]
                ],
                // 'logotipo',

                ['class' => 'kartik\grid\ActionColumn']
            ],
        ]); ?>
        <div class="row">
            <div class="col-md-10">
                <button type="button" onclick="comparar()" class="btn btn-primary" >Comparar Empresas</button>
                <button  data-toggle="modal" data-target="#cadAgrega" id="teste" style=" visibility: hidden"></button>

            </div>
            <div class="col-md-2" >
                <?= Html::a('Criar Empresa', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>


        <?php
    }else if (Yii::$app->user->getIdentificadorPessoa() == '2'){
        //Aluno
        ?>
        <?= GridView::widget([
            'id'=>'grid',
            'summary'=>'',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],

                'idEmpresa',
                [
                    'attribute' => 'Logotipo',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/img/'. $data['logotipo'],
                            ['width' => '30px']);
                    },
                ],
                'nome',
                //'analise:ntext',
                'fonte',
                [
                    'attribute' => 'tipo',
                    'hAlign' => 'center',
                    'value' => 'tipo',
                    'filter' => [
                        'Local' => 'Local',
                        'Nacional' => 'Nacional',
                        'Estrangeira' => 'Estrangeira'
                    ]
                ],
                // 'logotipo',

                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}'],
            ],
        ]); ?>
        <div class="row">
            <div class="col-md-10">
                <button type="button" onclick="comparar()" class="btn btn-primary" >Comparar Empresas</button>
                <button  data-toggle="modal" data-target="#cadAgrega" id="teste" style=" visibility: hidden"></button>

            </div>
        </div>
        <?php
    }else if (Yii::$app->user->getIdentificadorPessoa() == '3'){ //Empresa
        ?>
        <?= GridView::widget([
            'id'=>'grid',
            'summary'=>'',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],
                [
                    'attribute' => 'Logotipo',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/img/'. $data['logotipo'],
                            ['width' => '30px']);
                    },
                ],
                'nome',
                //'analise:ntext',
                'fonte',
                [
                    'attribute' => 'tipo',
                    'hAlign' => 'center',
                    'value' => 'tipo',
                    'filter' => [
                        'Local' => 'Local',
                        'Nacional' => 'Nacional',
                        'Estrangeira' => 'Estrangeira'
                    ]
                ],
                // 'logotipo',

                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}']

            ],
        ]); ?>
        <div class="col-md-10">
            <button type="button" onclick="comparar()" class="btn btn-primary" >Comparar Empresas</button>
            <button  data-toggle="modal" data-target="#cadAgrega" id="teste" style=" visibility: hidden"></button>

        </div>
        <?php
    }else{ // Visitante
        ?>
        <?= GridView::widget([
            'id'=>'grid',
            'summary'=>'',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],
                [
                    'attribute' => 'Logotipo',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/img/'. $data['logotipo'],
                            ['width' => '30px']);
                    },
                ],
                'nome',
                //'analise:ntext',
                'fonte',
                [
                    'attribute' => 'tipo',
                    'hAlign' => 'center',
                    'value' => 'tipo',
                    'filter' => [
                        'Local' => 'Local',
                        'Nacional' => 'Nacional',
                        'Estrangeira' => 'Estrangeira'
                    ]
                ],
                // 'logotipo',
                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}']

            ],
        ]);
        ?>
        <div class="col-md-10">
            <button type="button" onclick="comparar()" class="btn btn-primary" >Comparar Empresas</button>
            <button  data-toggle="modal" data-target="#cadAgrega" id="teste" style=" visibility: hidden"></button>

        </div>
        <?php
    }
    ?>

    <script type="application/javascript">
        //Criar controlador acesado vai requisição ajax."
        var keys;
        function comparar() {
            keys = $('#grid').yiiGridView('getSelectedRows');
            if (keys.length > 4) {
                alert('você pode comparar até 4 empresas!!');
            }else {
                if (keys.length < 2) {
                    alert('Selecione mais de uma empresa!');
                } else {
                    var ids = "";
                    for (i = 0; i < keys.length-1; i++) {
                        ids += keys[i] + "#";
                    }
                    ids += keys[keys.length-1];
                    $.ajax({
                        url: '<?php echo Url::to(['empresa/get_descricao']);?>',
                        type:'POST',
                        data: {
                            'empresa': ids,
                        },
                        success: function (data) {
                            var $teste = document.querySelector('.wrapper'), novohtml =  data;
                            $teste.insertAdjacentHTML('afterbegin', novohtml);
                        }
                    });
                    $("#teste").trigger('click');
                }
            }
        }

    </script>
    <?php
    //SELECT tipoDemonstracao.nome FROM tipoDemonstracao ]
    //JOIN demonstracao ON tipoDemonstracao.idtipoDemonstracao= demonstracao.idtipoDemonstracao 
    //WHERE demonstracao.Empresa_idEmpresa = 
    /*
     * <script type="application/javascript">
        //Criar controlador acesado vai requisição ajax."
        var keys;
        function comparar() {
            keys = $('#grid').yiiGridView('getSelectedRows');
            if (keys.length > 4) {
                alert('você pode comparar até 4 empresas!!');
            }else {
                if (keys.length < 2) {
                    alert('Selecione mais de uma empresa!');
                } else {
                    for (key in keys) {
                        var id = keys[key];
                        $.ajax({
                            url: '<?php echo Url::to(['empresa/get-descricao']); ?>',
                            type:'POST',
                            data: {
                                'empresa': id,
                            },
                            success: function (data) {
                                var $teste = document.querySelector('.wrapper'), novohtml =  data;
                                $teste.insertAdjacentHTML('afterbegin', novohtml);
                            }
                        });
                    }
                }
            }
        }

    </script>*/

    ?>
    <div class="modal" id="cadAgrega" role="dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <?= Html::a('&times;', ['index'], ['class' => 'btn close']) ?>
                    <h3 class="modal-title">Comparar Empresas</h3>
                </div>
                <div class="modal-body">
                    <form class="form-inline" role="form">
                        <div class="wrapper">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
