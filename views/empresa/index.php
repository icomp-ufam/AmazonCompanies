<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="empresa-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?php
    if(Yii::$app->user->getIdentificadorPessoa() == '1'){ //Administrador
        ?>
        <p>
            <?= Html::a('Criar Empresa', ['create'], ['class' => 'btn btn-success']) ?>

        </p>

        <?= GridView::widget([
            'id'=>'grid',
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
                'tipo',
                // 'logotipo',

                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}'],
                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{update}'],
                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{delete}']
            ],
        ]); ?>
        <?php
    }else if (Yii::$app->user->getIdentificadorPessoa() == '2'){
        //Aluno
        ?>
        <?= GridView::widget([
            'id'=>'grid',
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
                'tipo',
                // 'logotipo',

                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}'],
            ],
        ]); ?>
        <?php
    }else if (Yii::$app->user->getIdentificadorPessoa() == '3'){ //Empresa
        ?>
        <?= GridView::widget([
            'id'=>'grid',
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
                'tipo',
                // 'logotipo',

                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}']

            ],
        ]); ?>
        <?php
    }else{ // Visitante
        ?>
        <?= GridView::widget([
            'id'=>'grid',
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
                'tipo',
                // 'logotipo',
                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}']

            ],
        ]);
        ?>
        <?php
    }
    ?>

    <div class="col-md-3">
        <button type="button" onclick="comparar()" class="btn btn-default" >Comparar Empresas</button>
        <button  data-toggle="modal" data-target="#cadAgrega" id="teste" style=" visibility: hidden"></button>
    </div>
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
                        url: '<?php echo Url::to(['empresa/get-descricao']); ?>',
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
