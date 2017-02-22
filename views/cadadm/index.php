<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CadadmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuário Cadastrados';
?>

<?php $this->params['breadcrumbs'][] = $this->title;?>
<div class="cadadm-index">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',
        	'login',
        	 [
        	 		'attribute' => 'ativo',
            		'class' => 'kartik\grid\BooleanColumn'
   			 ],
        	[
        			'attribute' => 'identificadorPessoa',
        			'hAlign' => 'center',
        			'value' => function($model, $index, $dataColumn) {
        					if($model->identificadorPessoa == 1){
        						return 'Administrador';
        					}else if($model->identificadorPessoa == 2){
        						return 'Aluno';
        					}else{
        						return 'Empresa';
        					}
        			},
        			'filter' => [
        					'1' => 'Administrador',
        					'2' => 'Aluno',
        					'3' => 'Empresa'
        			]
    		],
            'email:email',
            [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'Notificar',
            'template' => '{notificar}',
            'buttons' => [
            		'notificar' => function ($url, $model)	{
            		if($model->identificadorPessoa == 2){
            			return Html::a('<span class = "glyphicon glyphicon-exclamation-sign" style="color:orange;"</span>', $url, [
            					'title' => 'Notificar aluno',
            					'data' => [
            							'confirm' => 'Deseja notificar aluno?'
            					]
            			]);
            		}else{
            			return Html::a('<span class = "glyphicon glyphicon-remove" style="color:gray;"</span>');
            		}
            		},
            		],
            
            		'urlCreator' => function ($action, $model, $key, $index){
            		if($action == 'notificar'){
            			$url = Url::toRoute(['/notificacao/create3', 'Usuario_idUsuario' => $model->idUsuario, 'idAnalise' => NULL, 'status' => 3, 'tipo' => 2]);
            			return $url;
            		}
            		}
            
            		],
        ],
    ]); ?>
</div>
