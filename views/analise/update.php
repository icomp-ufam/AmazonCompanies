<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Analise */

//$this->title = $model->idEmpresa0->nome;
//$this->title = $model->idEmpresa0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idanalise, 'url' => ['view', 'id' => $model->idanalise]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="analise-update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(Yii::$app->user->getIdentificadorPessoa() == '1'){ // edição para o adm?> 

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>
    
<?php }else if(Yii::$app->user->getIdentificadorPessoa() == '2'){ ?>
	<?= $this->render('_formUpdateAluno', [
        'model' => $model,
    ]) ?>
<?php } ?>
</div>
