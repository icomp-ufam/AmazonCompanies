<?php

use yii\helpers\Html;
use yii\helpers\url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Validar Usuários';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->params['breadcrumbs'][] = $this->title;?>
<div class="usuario-index">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
    <br>
    
    <?= GridView::widget([
    	'summary' => '',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	
        'columns' => [
            'login',
        	'nome',
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
        	[
        		'class' => 'kartik\grid\ActionColumn',
        		'header' => 'Ativar/Desativar',
        		'template' => '{activate}{deactivate}',
        		'buttons' => [
        			'deactivate' => function ($url, $model)	{
        				if($model->ativo == '1'){
        					return Html::a('<span class = "glyphicon glyphicon-ok" style="color:green;"</span>', $url, [
        							'title' => 'Desativar',
        							'data' => [
        									'confirm' => 'Deseja desativar usuário '. $model->nome . ' ?'
        							]
        					]);
        				}
        			},
        			'activate' => function ($url, $model)	{
        				if($model->ativo == '0'){
        					return Html::a('<span class = "glyphicon glyphicon-remove" style="color:red;"</span>', $url, [
        							'title' => 'Ativar',
        							'data' => [
        									'confirm' => 'Deseja ativar usuário '. $model->nome . ' ?',
        							]
        					]);
        				}else if($model->ativo == '2'){
        					return Html::a('<span class = "glyphicon glyphicon-alert" style="color:orange;"</span>', $url, [
        							'title' => 'Pendente',
        							'data' => [
        									'confirm' => 'Deseja ativar usuário '. $model->nome . ' ?',
        							]
        					]);
        				}
        			}
        		],
        		
        		'urlCreator' => function ($action, $model, $key, $index){
        			if($action == 'activate' || $action == 'deactivate'){
        				$url = Url::toRoute(['status', 'id' => $model->idUsuario]);
        				return $url;
        			}
        		}
        		
        	],
        	[
        		'class' => 'kartik\grid\ActionColumn',
        		'header' => 'Apagar',
        		'template' => '{delete}'
        	]
        ],
    ]); ?>
</div>
