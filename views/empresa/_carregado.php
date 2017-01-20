<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prorrogacao */

$this->title = 'Update de Arquivo';

?>

<div class="panel panel-default">
    <div class="panel-body">
        <br>
        <p>
            <?php
                echo '<b>Atenção!</b>';      
            ?>
        </p>
        <p>
            <?php
                echo 'Arquivo carregado com sucesso!';      
            ?>
        </p>
        
        <br>
        <p>
            
            <?= Html::a('<span class="fa fa-close"></span> Cancelar', ['index', 'id' => $model->idEmpresa], [
                'class' => 'btn btn-success',
            ]);
            ?>
        </p>
    </div>
</div>