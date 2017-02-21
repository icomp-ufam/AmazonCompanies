<?php

use yii\helpers\Html;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RodapeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rodapé');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rodape-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            'id',
            'link',
            [
                'class' => 'kartik\grid\ActionColumn',
            	'header' => 'Atualizar link',
                'template'=> '{update}'	
            ]
            
        ],
    ]); ?>
</div>


