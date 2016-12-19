<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Atualizar Cadastro';//$model->idUsuario;
//$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idUsuario, 'url' => ['view', 'id' => $model->idUsuario]];

?>
<div class="usuario-update">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
	<br>
    <?= $this->render('_formAtt', [
        'model' => $model,
    ]) ?>

</div>
