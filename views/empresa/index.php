<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\db\Query;
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
                <?= Html::a('Create Empresa', ['create'], ['class' => 'btn btn-success']) ?>

            </p>

        <?= GridView::widget([
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
        }else if (Yii::$app->user->getIdentificadorPessoa() == '3'){ //Empresa
    ?>
            <?= GridView::widget([
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
                        'template'=> '{view}']

                ],
            ]); ?>
    <?php
        }else{ // Visitante
    ?>
    <?= GridView::widget([
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
                'template'=> '{view}']

        ],
    ]);
    ?>
    <?php
    }
    ?>
    <div class="col-md-3">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#cadAgrega">Comparar Empresas</button>
    </div>
    <script>
        var keys = $('#grid').yiiGridView('getSelectedRows');
        console.log(keys);
    </script>

    <div class="modal" id="cadAgrega" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Comparar Empresas</h3>
                </div>
                <div class="modal-body">
                    <form class="form-inline" role="form">
                        <div class="form-group">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Enviar</button>
                </div>
            </div>
        </div>
    </div>


</div>
