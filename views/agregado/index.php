<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgregadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agregados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agregado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Agregado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAgregado',
            'nome',
            'sigla',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
