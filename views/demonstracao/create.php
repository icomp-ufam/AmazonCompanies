<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Demonstracao */

$this->title = Yii::t('app', 'Create Demonstracao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Demonstracaos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demonstracao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
