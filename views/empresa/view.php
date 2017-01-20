<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\data\ActiveDataProvider;
    use yii\db\Query;
    use yii\grid\GridView;
    use yii\widgets\ActiveForm;
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
        
        <div>
            
            <label>Fonte:</label><?= Html::encode(' '.$model->fonte) ?>
            

        </div>
        <div>
            <?= $this->render('_telaBotao', [
                'model' => $model,
                ]) ?>
        </div>
            

        
        
    </p>
</div>

<div class="body-content">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#demox">Balanço Patrimonial</a></li>
        <li><a data-toggle="tab" href="#demoy">Demonstração dos Fluxos de Caixa</a></li>
        <li><a data-toggle="tab" href="#demoz">Demonstração do Resultado do Exercício</a></li>
        <li><a data-toggle="tab" href="#demov">Índice</a></li>
    </ul>

    <div class="tab-content">
        <div id="demox" class="tab-pane fade in active">
            <div class="container">            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox"/></th>
                                <th>Nome Conta</th>
                                <th>Valor</th>
                            </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Ativo Circulante Financeiro</td>
                            <td>R$ 31.647.000,00</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Disponibilidades</td>
                            <td>R$ 31.647.000,00</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Ativo Circulante Operacional</td>
                            <td>R$ 771.547.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="demoy" class="tab-pane fade">
            <div class="container">            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox"/></th>
                                <th>Nome Conta</th>
                                <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Depreciação e Amortização</td>
                                <td>R$ 7.529.000,00</td>  
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Provisões e Atualizações para demandas Judiciais e Administrativas</td>
                            <td>R$ 14.375.000,00</td>    
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Ajuste a Valor Presente</td>
                            <td>R$ -3.057.000,00</td>    
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="demoz" class="tab-pane fade">
            <div class="container">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox"/></th>
                            <th>Nome Conta</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">Receita Líquida de Vendas</td>
                            <td>R$ 814.175.000,00</td>    
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">Custo dos Produtos</td>
                            <td>R$ -764.866.000,00</td>    
                        </tr>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">Lucro Bruto</td>
                            <td>R$ 49.309.000,00</td>    
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="demov" class="tab-pane fade">
                <div class="container">            
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#indicex">Liquidez</a></li>
                        <li><a data-toggle="tab" href="#indicey">Endividamento</a></li>
                        <li><a data-toggle="tab" href="#indicez">Lucratividade</a></li>
                        <li><a data-toggle="tab" href="#indicev">Rentabilidade</a></li>
                        <li><a data-toggle="tab" href="#indicev">Giros e Prazos</a></li>
                        <li><a data-toggle="tab" href="#indicev">Giros Assaf Neto</a></li>
                        <li><a data-toggle="tab" href="#indicev">Giros Viaconti</a></li>
                    </ul>

<<<<<<< Updated upstream
                    <div class="tab-content">
                        <div id="indicex" class="tab-pane fade in active">
                            <div class="container">            
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"/></th>
                                            <th>Agregados</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('Ex: Lucro Gerado = (Ativos Totais/Passivo Exigível)')" onmouseout = "UnTip()">LG = (AT/PE)</td>
                                            <td>R$ 31.647.000,00</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" /></td>
                                            <td onmouseover="Tip('Ex: Lucro Contínuo = (Ativos Circulantes/Passivos Circulantes)')" onmouseout = "UnTip()">LC = (AC/PC)</td>
                                            <td>R$ 31.647.000,00</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" /></td>
                                            <td onmouseover="Tip('Ex: Lucro Significativo = (Ativos Circulantes - Estoques)/Passivos Circulantes')" onmouseout = "UnTip()">LS = (AC-Estoques)/PC</td>
                                            <td>R$ 771.547.000,00</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="indicey" class="tab-pane fade">
                            <div class="container">            
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"/></th>
                                            <th>Agregados</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">EG = PE/PT</td>
                                            <td>R$ 7.529.000,00</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">RCT = PE/PL</td>
                                            <td>R$ 14.375.000,00</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">ED = PC/PNC</td>
                                            <td>R$ -3.057.000,00</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="indicez" class="tab-pane fade">
                            <div class="container">           
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox"/></th>
                                            <th>Agregados</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^2')" onmouseout = "UnTip()">MB = LB/VL</td>
                                            <td>R$ 814.175.000,00</td>    
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^4')" onmouseout = "UnTip()">MO = LO/VL</td>
                                            <td>R$ -764.866.000,00</td>    
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td onmouseover="Tip('e=mc^3')" onmouseout = "UnTip()">ML = LL/VL</td>
                                            <td>R$ 49.309.000,00</td>    
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
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