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

    use app\models\Demonstracao;

    use app\models\Indice;

use kartik\widgets\FileInput;



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

        
        <li><a data-toggle="tab" href="#demoIndice">Índice</a></li>
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
                            <th><input type="checkbox"/></th>
                            <th>Nome Conta: <?=$demonstracao->idDemonstracao?></th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Receita Líquida de Vendas</td>
                            <td>R$ 814.175.000,00</td>    
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
                                            <th></th>
                                            <th>Formula: <?=$tipoIndice->idTipo_indice?></th>
                                            <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                $tweets = [['nome'=>'Liquidez', 'id'=>100]];

                                                foreach($anosEmpresas as $anosEmpresa){  
                                            ?>
                                            <th><?=$anosEmpresa->ano?></th>
                                            <?php
                                                }   
                                            ?>  
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $indices = Indice::find()->select('*')->where(['idTipo_indice' => $tipoIndice->idTipo_indice])->all();

                                                 $sinais = ['+', '-', '/', '*', '(', ')'];
                                                foreach($indices as $indice){
                                                    $indiceIn = Indice::find()->select('formula')->where(['idIndice' => $indice->idIndice])->all();

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
                                            <td></td>
                                            <td onmouseover="Tip('Ex: Lucro Gerado = (Ativos Totais/Passivo Exigível)')" onmouseout = "UnTip()"><?=$montarFormula?></td>
                                            <?php
                                            $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
                                                $tweets = [['nome'=>'Liquidez', 'id'=>100]];

                                                foreach($anosEmpresas as $anosEmpresa){  
                                            ?>
                                            <td>
                                            
                                    
                                            
                                            </td>
                                            <?php
                                                }   
                                            ?>  

                                            <td>
                                                <button type="button" onclick="comparar(<?=$indice->idIndice?>)" class="btn btn-default" >Calcular</button>
                                                <button  data-toggle="modal" data-target="#cadCalIndice" id="teste" style=" visibility: hidden"></button>

                                            </td>
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
               
            <?=$anosEmpresa->ano?>;
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

    </script>






        </div>
    </div>



<div id="analise" class="row">
    <legend>Gráfico</legend> 
    <div id="grafico" style="width: auto; height: auto; margin: 0 auto"></div>
   
<script language="JavaScript">$(function () {
    Highcharts.chart('grafico', {
        chart: {
            type: 'bar'
        },
        title: {
            text: '' //Colocar o nome da empresa via PHP
        },
        subtitle: {
            text: '' //Colocar a fonte via PHP
        },
        xAxis: {
            categories: ['Ativo Circulante', 'Ativo Circulante Financeiro', 'Disponibilidades', 'Ativo Circulante Operacional', 'Estoques', 'Contas a Receber', 'Partes Relacionais','Impulso a Recuperar', 'Bens destinados à venda','Outros Ativos', 'Total do Ativo Circulante'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Quantidade em Milhões de Reais',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: 'R$'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '2013',
            data: [91381, 91381, 564384, 265916, 96377, 186664, 12253,39,3135, 655765]
        }, {
            name: '2014',
            data: [46051, 46051, 749872, 312579, 114499, 307460, 11170, 39, 4125]
        }, {
            name: '2015',
            data: [31647, 31647, 771547, 218310, 95738, 437522, 18847, 39, 1091, 803194]
        }]
    });
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

<div class="row">
</br>
    <legend>Deixe seu comentário</legend>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Escreva seu comentário aqui">
        <div class="input-group-btn">
            <button type="button" class="btn btn-default">Enviar Comentário</button>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Comentário</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                   dolore magna aliqua</td>
                    <td>Giselle</td>
                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td>
                    <td>Nick</td>
                </tr>
                <tr>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td>
                    <td>André</td>
                </tr>
            </tbody>
        </table>
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
