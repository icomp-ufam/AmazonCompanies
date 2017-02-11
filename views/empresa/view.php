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
                        //$idIndices = TipoIndice::find()->select('idTipo_indice')->all();
                        $tweets = [['nome'=>'Liquidez', 'id'=>100]];

                        


                        

                        foreach($demonstracoes as $demonstracao){

                         
                    ?>
                    <li><a data-toggle="tab" href="#Demonstracao<?=$demonstracao->idDemonstracao?>"><?=$demonstracao->nomeDemonstracao?></a></li>

                <?php
                        }   
                    ?>

        
        <li><a data-toggle="tab" href="#demoIndice">ÍNDICE</a></li>
    </ul>

    <div class="tab-content">
        <?php
                        $demonstracoes = Demonstracao::find()->select('*')->all();
                        //$idIndices = TipoIndice::find()->select('idTipo_indice')->all();
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
        
        <div id="demoIndice" class="tab-pane fade">
                <div class="container">            
                    <ul class="nav nav-tabs">
                    <?php
                        $tipoIndices = TipoIndice::find()->select('*')->all();
                        //$idIndices = TipoIndice::find()->select('idTipo_indice')->all();
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
                        //$idIndices = TipoIndice::find()->select('idTipo_indice')->all();
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


                                            <!-- <td>
                                                <button type="button" onclick="comparar(<?=$indice->idIndice?>)" class="btn btn-default" >Calcular</button>
                                                <button  data-toggle="modal" data-target="#cadCalIndice" id="teste" style=" visibility: hidden"></button>

                                            </td> -->
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
        // array(
        //     array(
        //         'type' => 'column',
        //         'name' => '2014',
        //         'data' => array(3, 2),
        //     ),
        //     array(
        //         'type' => 'column',
        //         'name' => '2016',
        //         'data' => array(2, 3),
        //     ),
            
        // ),
    )
]);

 ?>


   
<script language="JavaScript">$(function () {
    //     $names = [
    //     {
    //             name: '2014',
    //             data: [91381, 91381, 564384, 265916, 96377, 186664, 12253,39,3135, 655765]
    //         },

    //     {
    //             name: '2016',
    //             data: [91381, 91381, 564384, 265916, 96377, 186664, 12253,39,3135, 655765]
    //         },

    //     ];
    //     $names[0]['name'] = '2013';
    //     //$names[0]['data'] = 200;

    //     // console.log($names[0]['name']);
    //     // console.log($names[0]['data']);


    // Highcharts.chart('grafico', {
    //     chart: {
    //         type: 'bar'
    //     },
    //     title: {
    //         text: '' //Colocar o nome da empresa via PHP
    //     },
    //     subtitle: {
    //         text: '' //Colocar a fonte via PHP
    //     },
    //     xAxis: {
    //         categories: ['Ativo Circulante', 'Ativo Circulante Financeiro', 'Disponibilidades', 'Ativo Circulante Operacional', 'Estoques', 'Contas a Receber', 'Partes Relacionais','Impulso a Recuperar', 'Bens destinados à venda','Outros Ativos', 'Total do Ativo Circulante'],
    //         title: {
    //             text: null
    //         }
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Quantidade em Milhões de Reais',
    //             align: 'high'
    //         },
    //         labels: {
    //             overflow: 'justify'
    //         }
    //     },
    //     tooltip: {
    //         valueSuffix: 'R$'
    //     },
    //     plotOptions: {
    //         bar: {
    //             dataLabels: {
    //                 enabled: true
    //             }
    //         }
    //     },
    //     legend: {
    //         layout: 'vertical',
    //         align: 'right',
    //         verticalAlign: 'top',
    //         x: -40,
    //         y: 80,
    //         floating: true,
    //         borderWidth: 1,
    //         backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
    //         shadow: true
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     series: $names
    // });
});
</script>
   

<div id="analise" class="row">
    <legend>Análise</legend>
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
        $flag = false;
        foreach($posts as $post){
            if (!empty($post) and $post['status'] == 1){
                $flag = true;
                echo '<div class="col-md-10" style="background-color: lavender">';
                print_r($post['texto']);
                echo '</div>';
            }
        }
        if($flag == false){
         echo "<div class='text-info'>Essa empresa não possui análise registrada! </div><br>";
         echo '<a href="http://localhost/AmazonCompanies/web/index.php?r=analise%2Fcreate&idEmpresa=' . $model->idEmpresa . '"><button class="btn btn-default">Criar Análise</button> </a>';
        }
    ?>
</div>

<div id = "comentario" class="row">
</br>

<!-- ?php if(Yii::$app->user->isGuest) { ?> -->

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

    <?= $form->field($comentario, 'hora')->hiddenInput(['value'=>time('H:i:s')])->label(false); ?>

    <?= $form->field($comentario, 'Comentario_idComentario')->hiddenInput(['value'=>null])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar Comentário', ['class' =>  'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- ?php } ?>  -->

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
                    echo '<a href="http://localhost/AmazonCompanies/web/index.php?r=comentario%2Fcreate&idEmpresa=' . $model->idEmpresa . ' &Comentario_idComentario=' . $coment . '"><button class="btn btn-default">Responder</button> </a>';
                    echo '</td>';//}
                    // echo '<td >';
                    // if(Yii::$app->user->getIdentificadorPessoa() == '1'){
                    // echo '<a href="http://localhost/AmazonCompanies/web/index.php?r=comentario%2Fcreate&idEmpresa=' . $model->idEmpresa . ' &Comentario_idComentario=' . $coment . '"><button class="btn btn-danger">Excluir comentário</button> </a>';
                    // echo '</td>';}
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

 </div>
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
