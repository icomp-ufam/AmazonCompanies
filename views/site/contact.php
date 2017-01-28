<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Usuario;

$this->title = 'Fale Conosco';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Obrigado por entrar em contato. O administrador fará contato em breve.
        </div>
        
    <?php else: ?>

        <p>
            Contate o administrador do sistema!
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
					
					<?php if(Yii::$app->user->isGuest):?>
                    	<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    	<?= $form->field($model, 'email') ?>
						
						<?= $form->field($model, 'subject') ?>
					<?php else: ?>
						<?= $form->field($model, 'name')->hiddenInput(['value' => Yii::$app->user->getNome()])->label(false)?>

                    	<?= $form->field($model, 'email')->hiddenInput(['value'=> Yii::$app->user->getEmail()])->label(false) ?>
                    	
                    	<?= $form->field($model, 'subject')->textInput(['autofocus'=>true]) ?>
					<?php endif;?>
                   
                    <?= $form->field($model, 'body')->textarea(['rows' => 2]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submeter', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
