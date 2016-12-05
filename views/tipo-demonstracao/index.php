<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDemonstracaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Demonstracaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-demonstracao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Demonstracao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTipo_Demonstracao',
            'nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
