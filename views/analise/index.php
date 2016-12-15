<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnaliseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analises';
$this->params['breadcrumbs'][] = $this->title;
$testProvider = $dataProvider;
?>
<div class="analise-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--?= Html::a('Create Analise', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'idanalise',
//            ['attribute'=>'texto',
//            'value'=>'texto',
//            'format'=>'html'],
            'idEmpresa0.nome',
            'status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{view}'],
            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{update}'],
            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{delete}']
        ],
    ]); ?>
</div>
