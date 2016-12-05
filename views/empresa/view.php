<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->defaultExtension = $model->logotipo
?>
<div class="empresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Html::img('img/'.$this->defaultExtension,  ['style'=>'width:50px']))?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEmpresa',
            'nome',
            'analise:ntext',
            'fonte',
            //[
             //   'attribute'=>'Tipo_Empresa_idTipo_Empresa',
              //  'value'=>$model->tipo_empresa->nome
            //],
            'tipoEmpresaIdTipoEmpresa.nome',
           // 'logotipo'
        ],
    ]) ?>
    <p align="center">

        <?= Html::a('Update', ['update', 'id' => $model->idEmpresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idEmpresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
