<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Notificacao;
use app\models\Analise;
use xj\bootbox\BootboxAsset;


/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Notificações');

?>
<div class="notificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->getIdentificadorPessoa() == '1'){ // aqui exibiria as notificações que o adm mandou?> 

    
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            ['attribute'=>'idAnalise',
             'value'=>'usuarioIdUsuario.nome',

            ],
            'status', 
            'conteudo',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>

    <div class="notificacao-index">


    <?php }else{ ?>
            
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
            //'idEmpresa0.nome',
            //'Usuario_idUsuario',

           
            'usuarioIdUsuario.nome',
            
            'analise.texto',            
            'analise.textoAnalisador',

            [
                    'class' => 'kartik\grid\BooleanColumn',
                    'attribute' => 'analise.status'
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}',       

            ],
        ],
    ]); ?>


     
    <?php } ?>
</div>


