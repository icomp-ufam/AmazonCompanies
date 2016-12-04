<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\editable\Editable;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Validar Cadastros';


?>

<?php
        if(Yii::$app->user->getIdentificadorPessoa() == '1'){ //Administrador
    ?>

<div class="usuario-index">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>


  
  
 <?=  GridView::widget([
 		'filterModel' => $searchModel,
 		'dataProvider'=> $dataProvider,
 		
 		
 	
 		//'showPageSummary' => true,
 		
 		'columns' => [
          

            'nome',
        	'email:email',
        	'login',
           	//'ativo',
 				
			[
 				'class'=>'kartik\grid\BooleanColumn',
 				'attribute'=>'ativo',
 				//'vAlign'=>'middle'
 			],
 				[
 				'attribute' => 'ativo',
 				'class' => 'kartik\grid\EditableColumn',
 				'editableOptions' => [
 						'asPopover' => false,
 						'inputType' => Editable::INPUT_DROPDOWN_LIST,
 						'data' => ['1'=>'Ativar','0'=>'Desativar'],
 						'displayValueConfig' => ['Ativar' => '<p class="glyphicon glyphicon-ok"/p>',
 								'Desativar' => '<i class="glyphicon glyphicon-remove">'
 								],
 				],
 				],
     
 				['class' => 'yii\grid\ActionColumn',
 				'template'=> '{delete}'],
        ],
 		
 ]);
?>
</div>
 <?php
        }else{
        	return null;
        }
    ?>