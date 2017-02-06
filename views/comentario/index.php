<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
$testProvider = $dataProvider;
?>
<div class="comentario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'idComentario',
            // 'conteudo:ntext',
            // 'Empresa_idEmpresa',
            // 'nome',
            // 'email:email',
            // 'data',
            // 'hora',
            // 'Comentario_idComentario',
               'idEmpresa0.nome',
            
            
                    ['class' => 'yii\grid\ActionColumn'],
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'Visualizar Comentário',
                'template'=> '{view}'   
            ]
        ],
    ]); ?>
</div>
