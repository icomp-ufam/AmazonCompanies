<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rodape */

$this->title = $model->link;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rodapes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rodape-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Voltar', ['rodape/index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Atualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'link',
        ],
    ]) ?>

</div>
