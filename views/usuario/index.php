<?php

use kartik\widgets\ActiveForm;
use kartik\helpers\Html;
use kartik\builder\TabularForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Validar Cadastros';


?>



<div class="usuario-index">

    <h2><strong><?= Html::encode($this->title) ?></strong></h2>


  
  
 <?php  $form = ActiveForm::begin();?>
 <?= 
TabularForm::widget([
    'dataProvider'=>$dataProvider,
    'form'=>$form,
	
	'actionColumn' => false,
		'serialColumn' => false,
		'checkboxColumn' => false,
    'attributes'=> $searchModel->formAttribs
		
]);
?>

<?=  '<div class="form-group">' . 
     Html::submitButton('Salvar', ['class'=>'btn btn-primary']) .
     '<div>';
     ?>
<?php ActiveForm::end();?>
</div>
 