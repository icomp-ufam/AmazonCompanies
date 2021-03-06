<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indice */

$this->title = $model->idIndice;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Indices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idIndice], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idIndice], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idIndice',
            'formula',
            'idTipo_Indice',
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
        ],
    ]) ?>

</div>

