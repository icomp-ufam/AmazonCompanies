<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Cadastro';
?>
<div class="usuario-create">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
	<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
