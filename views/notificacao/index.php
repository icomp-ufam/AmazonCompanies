<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotificacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Notificações');

?>
<div class="notificacao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->getIdentificadorPessoa() == '1'){ // aqui exibiria as notificações que o adm mandou?> 

    <p>
        <?= Html::a(Yii::t('app', 'Enviar Notificacao'), ['create'], ['class' => 'btn btn-success']) // verificando a possibilidade de um adm mandar notificação?> 
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'usuarioIdUsuario.nome',
            'status',
            'conteudo:ntext',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php }else{ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

        		'tipo',
            	'conteudo:ntext',
        		'status',

            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]); ?>
    <?php } ?>
</div>
