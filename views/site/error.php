<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        O erro acima ocorreu enquanto o servidor Web foi o processamento da sua solicitação.
    </p>
    <p>
        Por favor entre em contato conosco se você acha que isto é um erro de servidor. Obrigado.
    </p>

</div>
