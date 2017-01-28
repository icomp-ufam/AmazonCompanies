<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                <?= Html::a(Yii::t('app', 'Pegar Tag'), ['pegar_tag'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idIndice',
            'formula',
            'idTipo_Indice',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
