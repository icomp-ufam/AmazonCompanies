<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Notificacao;
use app\models\Analise;
use app\models\Usuario;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;


/* @var $this yii\web\View */
/* @var $model app\models\Analise */

$this->title = $model->idEmpresa0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="analise-view">

    <h1><?= Html::encode($this->title) ?></h1>
	

    <div id="analise" class="row">

        <div class="title-body">
            
        </div>

        <div>
             <?php if ($model->investidor == 2){
                                $investidor = 'Comprar';

                            }
                            elseif ($model->investidor == 3) {
                                $investidor = 'Vender';
                            }
                            elseif ($model->investidor == 4) {
                                $investidor = 'Neutro';
                            }
                            ?>

                            <?php echo '<h5 class="bg-info col-md-3 col-md-offset-1 btn-lg text-center"> Tendencias para o investidor: </br> <strong>'. $investidor .'</strong>  </h5>' ?>


                            <?php if ($model->credor == 2){
                                $credor = 'Emprestar';

                            }
                            elseif ($model->credor == 3) {
                                $credor = 'Não emprestar';
                            }
                            ?>

                            <?php echo '<h5 class="bg-success col-md-3 col-md-offset-1 btn-lg text-center"> Tendencias para o credor: </br> <strong> '. $credor .' </strong> </h5>' ?>

        </div>

        <div class="col-md-8" style="background-color: lavender">

            <h4><strong>Texto a ser analisado enviado pelo aluno</strong></h4>
             <?= $model->texto ?> 

             <p><br></p>

            <h4><strong>Resultado da análise realizado pelo responsável</strong></h4>     
            <?= $model->textoAnalisador ?>
        </div>


         
		
    </div>
<?php if(Yii::$app->user->getIdentificadorPessoa() == '1'){?>
    <p>
    <br>
    <div class = "row">
    
    <?php echo '<label class="control-label"><h4>Status: </h4></label>'; ?>
    <?php if($model->status == 0){
    		echo "Desativado";
    	}else if($model->status == 1){ 
     		echo "Ativado";
    	}else{
    		echo "Não Analisado";
    	}
    	?>   
        </div>

    	
    	<?php if($model->status == 1){?>
    	<?=
    	Html::a('<span class="glyphicon glyphicon-ban-circle" aria-hidden=true></span> Invalidar Análise', ['desativar', 'id' => $model->idanalise], [
    			'class' => 'btn btn-danger',
    			'data' =>[
    			'confirm' => 'Deseja invalidar a análise e notificar o autor?'
    	]]) ?>
    	<?php }else if ($model->status == 0){ ?>
    	<?=	Html::a('<span class="glyphicon glyphicon-ok" aria-hidden=true></span> Validar Análise', ['ativar', 'id' => $model->idanalise], [
    			'class' => 'btn btn-success',
    			'data' =>[
    			'confirm' => 'Deseja validar a análise?'
    	]]) ?>
    	<?php }else{ ?>
    	<?=
    	Html::a('Validar Análise', ['ativar', 'id' => $model->idanalise], [
    			'class' => 'btn btn-success',
    			'data' =>[
    			'confirm' => 'Deseja validar a análise?'
    	]]) ?>
    	<?=
    	Html::a('Invalidar Análise', ['desativar', 'id' => $model->idanalise], [
    			'class' => 'btn btn-danger',
    			'data' =>[
    			'confirm' => 'Deseja invalidar a análise e notificar o autor?'
    	]]) ?>

        
    	
    	<?php }?>
    	
        
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/docs.min.css" rel="stylesheet">

        <?= Html::a('<span class="glyphicon glyphicon-upload" aria-hidden=true> </span> <span class=glyphicon-class> Editar Análise</span>',
            ['update', 'id' => $model->idanalise], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('<span class="glyphicon glyphicon-remove" aria-hidden=true> </span>
                     <span class=glyphicon-class> Apagar Análise</span>',
                      ['delete', 'id' => $model->idanalise], [
                       'class' => 'btn btn-danger',
                       'data' => [
                       'confirm' => 'Tem certeza que deseja apagar a análise?',
                       'method' => 'post',
         ],]) ?>

              


         <?= Html::a('<span class="glyphicon glyphicon-eye-close"></span> Cancelar', ['analise/index'], ['class' => 'btn btn-danger']) ?>
        
              




        
        <?php } ?>
    </p>
    <!--?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idanalise',
            'texto:ntext',
            'status',
            'idEmpresa',
        ],
    ]) ?-->
</div>
