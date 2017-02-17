<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
use yii\helpers\BaseUrl;
    use yii\widgets\DetailView;
    use yii\data\ActiveDataProvider;
    use yii\db\Query;
    use yii\grid\GridView;
    use yii\widgets\ActiveForm;
    use app\models\TipoIndice;
    use app\models\EmpresaConta;
        use app\models\Conta;
        use miloschuman\highcharts\Highcharts;
        use hscstudio\chart\ChartNew;
        use \Fintara\Tools\Calculator\Calculator;
        use \Fintara\Tools\Calculator\DefaultLexer;

    use app\models\Demonstracao;

    use app\models\Indice;
    use app\models\Analise;


use kartik\widgets\FileInput;
use phpnt\bootstrapSelect\BootstrapSelectAsset;
use kartik\widgets\Select2;



    /* @var $this yii\web\View */
    /* @var $model app\models\Empresa
     * */

    $this->title = $model->nome;
    $this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $this->defaultExtension = $model->logotipo
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script> 


<div class="empresa-view">
    <p>
        <h1>
            <?= Html::a(Html::img('img/'.$this->defaultExtension,  ['style'=>'width:50px']) ) ?>
            <?= Html::encode('Dados da '.$this->title) ?>
            
        </h1>

        
    </p>

    <p>
            <?= Html::a('<span></span> Gerar PDF', ['gerar_pdf'], ['class'=> 'btn btn-primary']) ?>
    </p>
</div>

<div class="body-content">
    <ul class="nav nav-tabs">
    <?php
                        $demonstracoes = Demonstracao::find()->select('*')->all();

                        foreach($demonstracoes as $demonstracao){
     
                    ?>
                    <li><a data-toggle="tab" href="#Demonstracao<?=$demonstracao->idDemonstracao?>"><?=$demonstracao->nomeDemonstracao?></a></li>

                <?php
                        }   
                    ?>

        
        <li><a data-toggle="tab" href="#demoIndice">ÍNDICE</a></li>
        <li><a data-toggle="tab" href="#demoContasObrigatorias">OBRIGATÓRIAS</a></li>

    </ul>

    <div class="tab-content">
        <?php
                        $demonstracoes = Demonstracao::find()->select('*')->all();
                        foreach($demonstracoes as $demonstracao){             
                    ?>
        <div id="Demonstracao<?=$demonstracao->idDemonstracao?>" class="tab-pane fade">
            <div class="container">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check_all" /></th>
                            <th>Nome Conta: <?=$demonstracao->idDemonstracao?></th>
                            <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                 $tweets = [['nome'=>'Liquidez', 'id'=>100]];
 
                                                foreach($anosEmpresas as $anosEmpresa){  
                                             ?>
                            <th><?=$anosEmpresa->ano?></th>
                            <?php
                                                }   
                                             ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contas = Conta::find()->select('*')->where(['idDemonstracao' => $demonstracao->idDemonstracao])->all();                                              
                            foreach($contas as $conta){
                                            ?>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><?=$conta->nome?></td>
                        
                               <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                 $tweets = [['nome'=>'Liquidez', 'id'=>100]];
 
                                                foreach($anosEmpresas as $anosEmpresa){
                                                    $valoress = EmpresaConta::find()->select('valor')->where(['idConta' => $conta->idConta])->andWhere(['ano' =>$anosEmpresa->ano])->all();
                                                    if(count($valoress)>0){
                                                        foreach($valoress as $valores){

                                             ?>             
                                                    <td>R$ <?=$valores->valor?></td> 
                                                    <?php
                                                        }
                                                    } else{
                                                    ?>             
                                                    <td>-----</td> 
                                                    <?php




                                                    }  
                                                } 
                                    } 
                                             ?>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <?php
                        }   
                    ?>
         <div id="demoContasObrigatorias" class="tab-pane fade">
            <div class="container">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check_all" /></th>
                            <th>Nome Conta:</th>
                            <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                 $tweets = [['nome'=>'Liquidez', 'id'=>100]];
 
                                                foreach($anosEmpresas as $anosEmpresa){  
                                             ?>
                            <th><?=$anosEmpresa->ano?></th>
                            <?php
                                                }   
                                             ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contas = Conta::find()->select('*')->where(['obrigatorio' =>1])->all();                                              
                            foreach($contas as $conta){
                                            ?>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><?=$conta->nome?></td>
                        
                               <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
 
                                                foreach($anosEmpresas as $anosEmpresa){
                                                    $valoress = EmpresaConta::find()->select('valor')->where(['idConta' => $conta->idConta])->andWhere(['ano' =>$anosEmpresa->ano])->all();
                                                    if(count($valoress)>0){
                                                        foreach($valoress as $valores){

                                             ?>             
                                                    <td>R$ <?=$valores->valor?></td> 
                                                    <?php
                                                        }
                                                    } else{
                                                    ?>             
                                                    <td>-----</td> 
                                                    <?php




                                                    }  
                                                } 
                                    } 
                                             ?>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div id="demoIndice" class="tab-pane fade">
                <div class="container">            
                    <ul class="nav nav-tabs">
                    <?php
                        $tipoIndices = TipoIndice::find()->select('*')->all();
                        $tweets = [['nome'=>'Liquidez', 'id'=>100]];

                        foreach($tipoIndices as $tipoIndice){

                         
                    ?>
                        <li><a data-toggle="tab" href="#Indice<?=$tipoIndice->idTipo_indice?>"><?=$tipoIndice->nome?></a></li>
                        
                        <?php
                        }   
                    ?>
                    </ul>

                    
                </div>
            </div>

            <div class="tab-content">
                    <?php
                        $tipoIndices = TipoIndice::find()->select('*')->all();
                        $tweets = [['nome'=>'Liquidez', 'id'=>100]];

                        foreach($tipoIndices as $tipoIndice){

                         
                    ?>

                        <div id="Indice<?=$tipoIndice->idTipo_indice?>" class="tab-pane fade">
                            <div class="container">            
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>Nome:</th>
                                            <th>Fórmula:</th>

                                            <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                 $tweets = [['nome'=>'Liquidez', 'id'=>100]];
 
                                                foreach($anosEmpresas as $anosEmpresa){  
                                             ?>
                            <th><?=$anosEmpresa->ano?></th>
                            <?php
                                                }   
                                             ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $indices = Indice::find()->select('*')->where(['idTipo_indice' => $tipoIndice->idTipo_indice])->all();

                                                 $sinais = ['+', '-', '/', '*', '(', ')'];
                                                    $calculator = new Calculator();
                                                foreach($indices as $indice){
                                                    $indiceIn = Indice::find()->select('*')->where(['idIndice' => $indice->idIndice])->all();

                                                     $getChaveContas = preg_split('/[@]/',$indiceIn[0]->formula);
                                                            
                                                            $montarFormulaAnterior = '';
                                                            $montarFormula='';
                                                            for ($i=0; $i <count($getChaveContas); $i++) {
                                                        if(in_array($getChaveContas[$i],$sinais)){                  
                                                            $montarFormulaAnterior = ' '.$montarFormula.' ';
                                                            $montarFormula=$montarFormulaAnterior.$getChaveContas[$i];
                                                        }else{ 
                                                            $conta = Conta::find()->select("*")->where(['chave' => $getChaveContas[$i]])->one();
                                                            $idConta = $conta['idConta'];
                                                        $montarFormulaAnterior = ' '.$montarFormula.' ';
                                                        $montarFormula=$montarFormulaAnterior.$conta['nome'];
                                                        }   
                                                    }
                                            ?>
                                        <tr>
                                        <td><?=$indiceIn[0]->nomeIndice?></td>
                                            <td><?=$montarFormula?></td>
                                            
                                            <?php  
                                                $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                                        foreach($anosEmpresas as $anosEmpresa) {
                                                                                    $concatenar='';
                                                                                    $anterior='';         
                                                                                    $verificaSeEhNull=0;
                                                                                    $montarFormulaAnterior = '';
                                                                                    $montarFormula='';

                                                                            for ($i=0; $i <count($getChaveContas); $i++) {
                                                                                if(in_array($getChaveContas[$i],$sinais)){
                                                                                    $anterior = $concatenar;
                                                                                    $concatenar = $anterior.$getChaveContas[$i];
                                                                                    $montarFormulaAnterior = ' '.$montarFormula.' ';
                                                                                    $montarFormula=$montarFormulaAnterior.$getChaveContas[$i];

                                                                                }else{ 
                                                                                    $conta = Conta::find()->select("*")->where(['chave' => $getChaveContas[$i]])->one();
                                                                                    $idConta = $conta['idConta'];
                                                                                    $empresaConta = EmpresaConta::find()->select("*")->where(['idConta' => $idConta])->andWhere(['ano' =>$anosEmpresa->ano])->andWhere(['idEmpresa' =>$model->idEmpresa])->one();
                                                                                    if($empresaConta==null){
                                                                                        $anterior = $concatenar;
                                                                                        $concatenar = $anterior.'xxxx';
                                                                                        $verificaSeEhNull = 1;
                                                                                    } else{
                                                                                        $anterior = $concatenar;
                                                                                    $concatenar = $anterior.$empresaConta['valor'];
                                                                                    }
                                                                                    $montarFormulaAnterior = ' '.$montarFormula.' ';
                                                                                    $montarFormula=$montarFormulaAnterior.$conta['nome'];    
                                                                                }   
                                                                            }
                                                                            if($verificaSeEhNull==1){
                                                                            ?>
                                                                            <td>-----</td> 
                                                                            <?php
                                                                            }else{
                                                                             $calculator->setExpression($concatenar);
                                                                                ?>
                                                                                    <td><?=$calculator->calculate()?></td>
                                                                                      <?php
                                                                         }
                                                                        }

                                                                                                            ?>

                                        </tr>
                                        <?php
                                                }   
                                            ?>
                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        }   
                    ?>
                       
                    </div>

            <script type="application/javascript">
        //Criar controlador acesado vai requisição ajax."
        var keys;
        function comparar(idIndice) {
            console.log("entrou");
               
                    $.ajax({
                        url: '<?php echo Url::to(['indice/calc_indice']);?>',
                        type:'POST',
                        data: {
                            'idEmpresa': <?=$model->idEmpresa?>,
                            'idIndice' : idIndice,
                        },
                        success: function (data) {
                            var $teste = document.querySelector('.wrapper'), novohtml =  data;
                            $teste.insertAdjacentHTML('afterbegin', novohtml);
                        }
                    });
                    $("#teste").trigger('click');
             
        }

        function getIdSelect(){
            console.log('entrou');
            var id_select = $('#id_select').val();
            console.log(id_select);
        }

    </script>

        </div>
    </div>

<div id="analise" class="row">

    <legend>Gráfico</legend> 
    <div id="grafico" style="width: auto; height: auto; margin: 0 auto"></div>

<?php 
echo Highcharts::widget([
   'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'Demonstração',
        ),
        'xAxis' => array(
            'categories' => $categorias,
        ),
        
        'series' => $field

    )
]);

 ?> 
 <div class="body-content">
    <ul class="nav nav-tabs">
    <?php
                         $analises = Analise::find()->select('ano')->where(['idEmpresa' => $model->idEmpresa])->all();

                        foreach($analises as $analise){
                         
                    ?>
                    <li><a data-toggle="tab" href="#Analise<?=$analise->ano?>"><?=$analise->ano?></a></li>
                <?php
                        }   
                    ?>
    </ul>
</div> </div>
    <div class="tab-content">
        <?php
                        $analisesanos = Analise::find()->select('*')->where(['idEmpresa' => $model->idEmpresa])->all();
                        foreach($analisesanos as $analiseano){            
                    ?>
        <div id="Analise<?=$analiseano->ano?>" class="tab-pane fade">
            <div class="container">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Analise:  </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $analises = Analise::find()->select('texto')->where(['ano' => $analiseano->ano])->andWhere(['idEmpresa' => $model->idEmpresa])->all();                                              
                            foreach($analises as $analise){
                                            ?>
                        <tr>
                            <td><?=$analise->texto?></td>

                            <?php if ($analiseano->investidor == 2){
                                $investidor = 'Comprar';

                            }
                            elseif ($analiseano->investidor == 3) {
                                $investidor = 'Vender';
                            }
                            elseif ($analiseano->investidor == 4) {
                                $investidor = 'Neutro';
                            }
                            ?>

                            <?php echo '<h5 class="bg-info col-md-3 col-md-offset-2 btn-lg text-center"> Tendencias para o investidor: </br> <strong>'. $investidor .'</strong>  </h5>' ?>


                            <?php if ($analiseano->credor == 2){
                                $credor = 'Emprestar';

                            }
                            elseif ($analiseano->credor == 3) {
                                $credor = 'Não emprestar';
                            }
                            ?>

                            <?php echo '<h5 class="bg-success col-md-3 col-md-offset-2 btn-lg text-center"> Tendencias para o credor: </br> <strong> '. $credor .' </strong> </h5>' ?>
                        
                               <?php
                                             
                                    } 
                                             ?>   
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <?php
                        }   
                    ?>
                

            <script type="application/javascript">
        //Criar controlador acesado vai requisição ajax."
        var keys;
        function comparar(idIndice) {
            console.log("entrou");
               
                    $.ajax({
                        url: '<?php echo Url::to(['indice/calc_indice']);?>',
                        type:'POST',
                        data: {
                            'idEmpresa': <?=$model->idEmpresa?>,
                            'idIndice' : idIndice,
                        },
                        success: function (data) {
                            var $teste = document.querySelector('.wrapper'), novohtml =  data;
                            $teste.insertAdjacentHTML('afterbegin', novohtml);
                        }
                    });
                    $("#teste").trigger('click');
             
        }

        function getIdSelect(){
            console.log('entrou');
            var id_select = $('#id_select').val();
            console.log(id_select);
        }

    </script>

         <?php echo '<a href="index.php?r=analise%2Fcreate&idEmpresa=' . $model->idEmpresa . '"><button class="btn btn-default">Criar Análise</button> </a>';
    ?>

<div id = "comentario" class="row">
</br>

<legend>Deixe seu comentário</legend>

<div class="comentario-form">

<?php $_SESSION = Yii::$app->session; 
$_SESSION->open();

$_SESSION["email"] = "larissa@icomp.ufam.edu.br";
$_SESSION["nome"] =  "Neves";
 ?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($comentario, 'conteudo')->textarea(['rows' => 6]) ?>

    <?= $form->field($comentario, 'nome')->hiddenInput(['value'=>$_SESSION["nome"]])->label(false); ?>

    <?= $form->field($comentario, 'email')->hiddenInput(['value'=>$_SESSION["email"]])->label(false); ?>

    <?= $form->field($comentario, 'data')->hiddenInput(['value'=>date('Y-m-d')])->label(false); ?>

    <?= $form->field($comentario, 'hora')->hiddenInput(['value'=>time('HH:MM:SS')])->label(false); ?>

    <?= $form->field($comentario, 'Comentario_idComentario')->hiddenInput(['value'=>null])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar Comentário', ['class' =>  'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
          
        $query = (new Query())->from('comentario')->where(['Empresa_idEmpresa'=> $model->idEmpresa]);
        $comentarioProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize'  => 10,
                'pageParam'=> '',
            ],
            'sort' => [
                'sortParam' => '',
            ],
        ]);

        $posts = $comentarioProvider->getModels();
        $comentarioProvider->pagination->pageParam = 'comentario-page';
        $comentarioProvider->sort->sortParam= 'comentario-sort';
        $flag = false;

            echo'<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Comentário</th>';
                echo '<th>Usuário</th>';
                echo '</tr>';
                echo '</thead>';
            foreach($posts as $post){
                if (!empty($post) && (empty($post['Comentario_idComentario']))){
                    $flag = true;
                    echo '<tr>';
                    echo '<td>';
                    print_r($post['conteudo']);
                    echo '</td>';
                    echo '<td>';
                    print_r($_SESSION["nome"]);
                    echo '</td>';
                    echo '<td border-color="#FFFFFF" bgcolor="#FFFFFF">';
                    $coment = ($post['idComentario']);
                    // if(Yii::$app->user->isGuest) {
                    echo '<a href="index.php?r=comentario%2Fcreate&idEmpresa=' . $model->idEmpresa . ' &Comentario_idComentario=' . $coment . '"><button class="btn btn-default">Responder</button> </a>';
                    echo '</td>';//}
                    echo '<td >';
                    if(Yii::$app->user->getIdentificadorPessoa() == '1'){
                    
                    echo '<a href="index.php?r=comentario%2Fview&idEmpresa=' . $model->idEmpresa . ' &id=' . $coment . '"><button class="btn btn-danger">Excluir comentário</button> </a>';}
                    echo '</td>';
                    echo '</tr>';
                    
                    foreach($posts as $post){
                        if (!empty($post) && (($post['Comentario_idComentario']) == $coment)){
                            echo '<tr>';
                            echo '<td bgcolor="#E6E6FA">';
                            print_r($post['conteudo']);
                            echo '</td>';
                            echo '<td bgcolor="#E6E6FA">';
                            print_r($post['nome']);
                            echo '</td>';
                            echo '</tr>';

                        }
                    }
                }
            }

        if($flag == false){
         echo "<div class='text-info'>Essa empresa não possui comentários! Seja o primeiro a comentar </div><br>";
        }   

    ?>

 <div class="modal" id="cadCalIndice" role="dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <?= Html::a('&times;', ['view', 'id' => $model->idEmpresa], ['class' => 'btn close']) ?>
                    <h3 class="modal-title">Cálculo de Índices</h3>
                </div>
                <div class="modal-body">
                    <form class="form-inline" role="form">
                        <div class="wrapper">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
