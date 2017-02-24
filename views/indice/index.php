<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Indices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Cadastrar Índice'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'nomeIndice',
            //'formula',
            [
                'attribute' => 'formula',
                'format' => 'html',
                //'title' => 'formula',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/img/calcuworld.png',
                        ['width' => '30px', 'title' => str_replace("@", "", $data->formula)] );


                },
            ],
            'idTipoIndice.nome',
            'idTipoIndice.descricao',
            ['attribute'=>'formato',
                'value'=> function($model, $index, $dataColumn){
                    if($model->formato=='1'){
                        return 'R$';
                    }
                    elseif ($model->formato=='2'){
                        return 'USD';
                    }
                    elseif ($model->formato=='3'){
                        return '%';
                    }
                    else {
                        return 'Absoluto';
                    }
                }


            ],

            ['class' => 'kartik\grid\ActionColumn'],

        ]
    ]); ?>
</div>