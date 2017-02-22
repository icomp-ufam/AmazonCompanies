<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnaliseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Análises';
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
        ['attribute'=> 'idEmpresa',
        'value'=> 'idEmpresa0.nome',
        'filter' => false
        ],
        
        ['attribute'=> 'Usuario_idUsuario',
        		'value'=> 'usuarioIdUsuario.nome',
        ],
        
         
        ['attribute'=>'texto',
        		'value'=>'texto',
        		'format'=>'html'],
        		'ano',
        		[
        				'class' => 'kartik\grid\ActionColumn',
        				'header' => 'Visualizar Análise',
        				'template'=> '{view}'
        		]


        ],
    ]); ?>
</div>
