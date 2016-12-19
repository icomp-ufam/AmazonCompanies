<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CadadmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuarário Cadastrados';
?>
<div class="cadadm-index">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <?= GridView::widget([
    	'summary'=>'',
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
        			}
    		],
            'email:email',
        ],
    ]); ?>
</div>
