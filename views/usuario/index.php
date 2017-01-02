<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    		'summary' => '',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	
        'columns' => [
        		
           // ['class' => 'kartik\grid\SerialColumn'],

            //'idUsuario',
            'login',
        	'nome',
            //'senha',
        	[
        		'class' => 'kartik\grid\BooleanColumn',
        		'attribute' => 'ativo'
        	],
            // 'identificadorPessoa',
            // 'email:email',
            		[
            		'class'=>'kartik\grid\EditableColumn',
            		'attribute'=> 'ativo',
					'format' => 'raw',
					'value' => function ($model) { 
						return SwitchInput::widget([
							'name' => $model->nome,
						//	'id'=>$model->nome.$model->idUsuario,
							'value'=>(!$model->ativo),
							'pluginOptions' => [
								'size' => 'medium',
								'onColor' => 'success',
								'offColor' => 'danger',
								'onText'=>'activate',
								'offText' => 'deactivate',
							]
						]);
            		}
    		],

        	//	['class' => 'kartik\grid\ActionColumn',
        	//	'template'=> '{status}'],
        ],
    ]); ?>
</div>
