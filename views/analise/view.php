<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            <h3><strong>Análise</strong></h3>
        </div>
         <div class="col-md-8" style="background-color: lavender">
             <?= $model->texto ?>
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
    	<br>
    	<?php if($model->status == 1){?>
    	<?=
    	Html::a('Invalidar Análise', ['desativar', 'id' => $model->idanalise], [
    			'class' => 'btn btn-danger',
    			'data' =>[
    			'confirm' => 'Deseja invalidar a análise?'
    	]]) ?>
    	<?php }else if ($model->status == 0){ ?>
    	<?=
    	Html::a('Validar Análise', ['ativar', 'id' => $model->idanalise], [
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
    			'confirm' => 'Deseja invalidar a análise?'
    	]]) ?>
    	
    	<?php }?>
    	<br>
        <br>
        <?= Html::a('Editar Análise', ['update', 'id' => $model->idanalise], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar Análise', ['delete', 'id' => $model->idanalise], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Tem certeza que deseja apagar a análise?',
                'method' => 'post',
            ],
        ]) ?>
         <?=
         // ativar funcionalidade de comentários
         Html::button('Notificar Autor', ['class' => 'btn btn-primary']) ?>
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
