<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDemonstracaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="tipo-demonstracao-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nome',
            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{update}    {delete}'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Criar Novo', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
