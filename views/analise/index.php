<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnaliseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analises';
$this->params['breadcrumbs'][] = $this->title;
$testProvider = $dataProvider;
?>
<div class="analise-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?= Html::a('Create Analise', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'idanalise',

            ['attribute'=>'Usuario_idUsuario',
             'value'=>'usuarioIdUsuario.nome',

            ],            
            //'idEmpresa0.nome',
            ['attribute'=>'idEmpresa',
             'value'=>'idEmpresa0.nome',

            ], 
            'texto',
            //'textoAnalisador',

            ['attribute'=>'textoAnalisador',
            'value'=>'textoAnalisador',
            'format'=>'html'],
        	[
        			'class' => 'kartik\grid\BooleanColumn',
        			'attribute' => 'status'
    		],

            [
            	'class' => 'kartik\grid\ActionColumn',
            	'header' => 'Visualizar Análise',
                'template'=> '{view}'	
                
    		]


        ],
    ]); ?>
</div>
