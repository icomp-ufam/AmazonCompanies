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
            Análise
        </div>
         <div class="col-md-8" style="background-color: lavender">
             <?= $model->texto ?>
        </div>

    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idanalise], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idanalise], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
