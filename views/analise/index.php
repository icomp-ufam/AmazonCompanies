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
//            ['attribute'=>'texto',
//            'value'=>'texto',
//            'format'=>'html'],
            

            ['attribute'=> 'idEmpresa',
             'value'=> 'idEmpresa0.nome',
            ],
            
            ['attribute'=> 'Usuario_idUsuario',
             'value'=> 'usuarioIdUsuario.nome',
            ],

   
        		['attribute'=>'texto',
        		'value'=>'texto',
        		'format'=>'html'],
            //'textoAnalisador',

            ['attribute'=>'textoAnalisador',
            'value'=>'textoAnalisador',
            'format'=>'html'],
        		[
        		'attribute' => 'status',
        		'hAlign' => 'center',
        		'value' => function($model, $index, $dataColumn) {
        			if($model->status == 2){
        				return 'Não Analisada';
        			}else if ($model->status == 1){
        				return 'Aceita';
        			}else{
        				return 'Rejeitada';
        			}
        		},
        		'filter' => [
        				'0' => 'Rejeitada',
        				'1' => 'Aceita',
        				'2' => 'Não Analisada',
        		]
        		],
            [
            	'class' => 'kartik\grid\ActionColumn',
            	'header' => 'Visualizar Análise',
                'template'=> '{view}'	
                
    		]


        ],
    ]); ?>
</div>
