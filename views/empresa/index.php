<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

</div>
