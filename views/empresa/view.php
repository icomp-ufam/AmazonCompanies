<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->defaultExtension = $model->logotipo
?>
<div class="empresa-view">

    <p>
        <h1>
            <?= Html::a(Html::img('img/'.$this->defaultExtension,  ['style'=>'width:50px']) ) ?>
            <?= Html::encode('Analise dos dados da empresa '.$this->title) ?>
        </h1>
    <?= $model->fonte ?>
    </p>
</div>
<?php

$query = (new Query())->from('analise')->where(['idEmpresa'=> $model->idEmpresa]);

$analiseProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize'  => 10,
        'pageParam'=> '',
    ],
    'sort' => [
        'sortParam' => '',
    ],

]);

$posts = $analiseProvider->getModels();
$analiseProvider->pagination->pageParam = 'analise-page';
$analiseProvider->sort->sortParam= 'analise-sort';

?>
    <div id="analise" class="row">
        <?php
            if (!empty($posts)){
                echo '<div class="col-md-10" style="background-color: lavender">';
                print_r($posts[0]['texto']);
                echo '</div>';
            }else {
                echo "<div class='text-info'>Essa empresa não possui análise registrada! </div><br>";
                if ((Yii::$app->user->getIdentificadorPessoa() == '1') or (Yii::$app->user->getIdentificadorPessoa() == '2')){
                    echo '<a href="http://localhost/AmazonCompanies/web/index.php?r=analise%2Fcreate&idEmpresa=' . $model->idEmpresa . '"><button class="btn btn-default">Criar Análise</button> </a>';
                }
            }
        ?>
    </div>
<!--?= Html::a('Create Analise', ['analise/create', 'id'=>$model->idEmpresa], ['class' => 'btn btn-default']) ?-->
<br>

