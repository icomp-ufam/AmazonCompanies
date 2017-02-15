<?php

use yii\helpers\Html;
use app\models\Usuario;

use app\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\Analise */

$this->title = 'Submeter Analise';
//$this->title = $model->idEmpresa0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$idEmpresa = $_GET['idEmpresa'];
$Usuario_idUsuario = Yii::$app->user->getId();
?>
<div class="analise-create">
    <h1> <!--?= Html::encode($this->title) ?--></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idEmpresa' => $idEmpresa,
        'Usuario_idUsuario' => $Usuario_idUsuario,
    ]) ?>

</div>
