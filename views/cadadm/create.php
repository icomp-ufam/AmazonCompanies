<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\cadadm */

$this->title = 'Cadastro de Usuários';
//$this->params['breadcrumbs'][] = ['label' => 'Cadadms', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadadm-create">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
	
	<h4>Escolha o perfil e insira os dados solicitados</h4>
	<br>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
