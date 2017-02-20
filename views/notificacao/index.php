<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Notificacao;
use app\models\Analise;
use yii\helpers\url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if(Yii::$app->user->getIdentificadorPessoa() == '1'){
	$this->title = Yii::t('app', 'Notificações');
}else{
	$this->title = Yii::t('app', 'Minhas Notificações');
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->getIdentificadorPessoa() == '1'){ // aqui exibiria as notificações que o adm mandou?> 
<p>
        <?= Html::a('Create Analise', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

           // 'usuarioIdUsuario.nome',
        		[
        		'attribute' => 'tipo',
        		'hAlign' => 'center',
        		'value' => function($model, $index, $dataColumn) {
        		if($model->tipo == 0){
        			return 'Análise';
        		}else if ($model->tipo == 1){
        			return 'Alteração de Dados';
        		}else{
        			return 'Outros';
        		}
        		},
        		'filter' => [
        				'0' => 'Análise',
        				'1' => 'Alteração de Dados',
        				'2' => 'Outros',
        		]
        		],
            'conteudo',
        	[
        		'attribute' => 'status',
        		'hAlign' => 'center',
        		'value' => function($model, $index, $dataColumn) {
        			if($model->status == 0){
        				return 'Rejeitada';
        			}else if ($model->status == 1){
        				return 'Aceita';
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
        		'header' => 'Ações',
        		'template' => '{edit} {dispensar}',
        		'buttons' => [
        				'edit' => function ($url, $model)	{
        				if($model->idAnalise != NULL && $model->status == 0){
        					return Html::a('<span class = "glyphicon glyphicon-edit" style="color:blue;"</span>', $url, [
        							'title' => 'Editar Análise',
        							'data' => [
        									'confirm' => 'Deseja editar análise?'
        							]
        					]);
        				}
        				},
        				'dispensar' => function ($url, $model)	{
        					if($model->status == 1){
        						return Html::a('<span class = "glyphicon glyphicon-check" style="color:red;"</span>', $url, [
        								'title' => 'Dispensar',
        								'data' => [
        										'confirm' => 'Deseja dispensar notificação?',
        								]
        						]);
        					}
        				}
        				],
        		
        				'urlCreator' => function ($action, $model, $key, $index){
        					if($action == 'edit'){
        						$url = Url::toRoute(['status', 'id' => $model->idNotificacao, 'idUsuario' => $model->Usuario_idUsuario, 'edit' => TRUE]);
        						return $url;
        					}else if($action == 'dispensar'){
        						$url = Url::toRoute(['status', 'id' => $model->idNotificacao, 'idUsuario' => $model->Usuario_idUsuario, 'edit' => FALSE]);
        						return $url;
        					}
        				}
        		
        				],
        ],
    ]); ?>

    </div>


