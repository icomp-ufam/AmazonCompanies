<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\Analise; 
use app\models\Usuario;
use app\models\Notificacao;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
    <style>
        .nav > li > form > button.logout:focus,
        .nav > li > form > button.logout:hover {
            text-decoration: none;
        }
        .nav > li > form > button.logout:focus {
            outline: none;
        }
        .navbar .nav > li > a {
            color: white;
        }
        .nav .open > a
        {
            background:green;

        }
        .navbar .navbar-nav .navbar-right .brand, .navbar .nav > li > a:hover {
            background: #0d6aad;
            color: white;
        }
        .navbar-inverse .navbar-right .navbar-nav>.active>a:hover {
            background: #0d6aad;
            color: white;
        }
        .navbar-inverse .navbar-right .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
            background: #0d6aad;
            color: white;
        }
        .navbar-inverse {
            background-color: #001a35;
            border-color: #001a35;
            background: linear-gradient(to right,  #001a35 , #0d6aad,  #001a35);
        }
        }

    </style>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    // contador de notificações
    $not_aluno = Notificacao::getNotification();
    $not_adm_analise =  Analise::getNotification();
    $not_adm_cadastro = Usuario::getNotification();
    $not_adm_alt_dados = 0; // gerar uma função que conte os pendentes desta funcionalidade.
	$not_adm_total = $not_adm_alt_dados + $not_adm_analise + $not_adm_cadastro;
    
    NavBar::begin([
        'brandLabel' => 'Amazon Companies',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
			['class' =>'nav navbar-nav'],
			
        ],
    ]);

	/*FooterBar::begin([
        'brandLabel' => 'Amazon Companies',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-bottom',
        ],
    ]);
	*/
    
    if(Yii::$app->user->getIdentificadorPessoa() == '1'){ //Administrador
    	echo Nav::widget([
    			'encodeLabels' => false,
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/adm']],
    					['label' => 'Empresas', 'url' => ['empresa/index']],
                        ['label' => 'Cadastro',
                        'items' =>[

                                        ['label' => 'Contas', 'url' => ['conta/index']],

                                        ['label' => 'Demonstrações', 'url' => ['demonstracao/index']],

                                        ['label' => 'Índices', 'url' => ['indice/index']],

                            ['label' => 'Tipo de índices', 'url' => ['tipo-indice/index']],
                                  ]
                        ],

    					['label' => 'Usuários',
    					'items' => [
    					['label' => 'Cadastrar', 'url' => ['/cadadm/create']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => 'Listar', 'url' => ['/cadadm/']],
    					]],
    					['label' => 'Notificações '. Html::tag('span', $not_adm_total, ['class' => 'badge']), // configurar para que o o botão, ao ser clicado abra as notificações e ao passar o mouse acima, exiba o dropdown
    					'items' => [
    							['label' => Html::tag('span', $not_adm_analise, ['class' => 'badge']).' Análises', 'url' => ['/analise/index']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => Html::tag('span', $not_adm_alt_dados, ['class' => 'badge']).' Alteração de Dados', 'url' => ['/empresa-conta/index']],
    							['label' => Html::tag('span', $not_adm_cadastro, ['class' => 'badge']).' Cadastro', 'url' => ['/usuario/']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/usuario/update', 'id' => Yii::$app->user->getId()]], 
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(																																																														 
    											'Sair (' . Yii::$app->user->identity->nome . ')',
    											['class' => 'btn btn-link logout']
    											)
    									. Html::endForm()
    									. '</li>'
    									)
    			],
    	]);
    }else if (Yii::$app->user->getIdentificadorPessoa() == '2'){ //Aluno
    	echo Nav::widget([
    	'encodeLabels' => false,
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/aluno']],
    					['label' => 'Empresas', 'url' => ['/empresa/index']],
    					['label' => 'Notificações '. Html::tag('span', $not_aluno, ['class' => 'badge']), 'url' => ['/notificacao/']],
    					['label' => 'Seu Perfil', 'url' => ['/usuario/update', 'id' => Yii::$app->user->getId()]],
    					['label' => 'Contato', 'url' => ['/site/contact']],
    					['label' => 'Sobre', 'url' => ['/site/about']],
    					 
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(
    											'Sair (' . Yii::$app->user->identity->nome . ')',
    											['class' => 'btn btn-link logout']
    											)
    									. Html::endForm()
    									. '</li>'
    									)
    			],
    	]);
    }else if (Yii::$app->user->getIdentificadorPessoa() == '3'){ //Empresa
    	echo Nav::widget([
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/empresa']],
    					['label' => 'Empresas',
    					'items' =>[

    							['label' => 'Cadastrar Informações', 'url' => ['/site/cadinfoemp']],

    							['label' => 'Listar Empresas Cadastradas', 'url' => ['empresa/index']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/usuario/update', 'id' => Yii::$app->user->getId()]],
    					['label' => 'Contato', 'url' => ['/site/contact']],
    					['label' => 'Sobre', 'url' => ['/site/about']],
    					
    					
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(
    											'Sair (' . Yii::$app->user->identity->nome . ')',
    											['class' => 'btn btn-link logout']
    											)
    									. Html::endForm()
    									. '</li>'
    									)
    			],
    	]);
    }else{ // Visitante
    	echo Nav::widget([
        	'options' => ['class' => 'navbar-nav navbar-right'],
        	'items' => [
            	['label' => 'Página Inicial', 'url' => ['/site/index']],
            	['label' => 'Empresas', 'url' => ['/empresa/index']],
            	['label' => 'Contato', 'url' => ['/site/contact']],
            	['label' => 'Sobre', 'url' => ['/site/about']],
            	
            	Yii::$app->user->isGuest ? (
                	['label' => 'Entrar', 'url' => ['/site/login']]
            	) : (
                	'<li>'
                	. Html::beginForm(['/site/logout'], 'post')
                	. Html::submitButton(
                    	'Sair (' . Yii::$app->user->identity->nome . ')',
                    	['class' => 'btn btn-link logout']
                	)
                	. Html::endForm()
                	. '</li>'
            	)
        	],
    	]);
    }
    
    NavBar::end();
    ?>


    <div class="container">
    	
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
	
<?php $this->endPage() ?>

 
		
<div class="art-footer" >
	<li class="list-group-item list-group-item-info">
				<table id="t01">
						<tr>
							<td style="text-align: left; vertical-align: top;">
										<div>
											<a href="http://proeg.ufam.edu.br/">Pr&oacute;-Reitoria de Gradua&ccedil;&atilde;o</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/cursos-oferecidos">Gradua&ccedil;&atilde;o</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/guia-do-aluno-2012">Guia do Aluno</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/calendario-academico">Calend&aacute;rio Acad&ecirc;mico</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/cursos-oferecidos">Cursos</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/formas-de-ingresso">Formas de Ingresso</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/enade">Enade</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/pet">Programa de Educa&ccedil;&atilde;o Tutorial</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/promes">Mobilidade Estudantil</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/estagio">Est&aacute;gio</a>
										</div>
										<div>
											<a href="http://proeg.ufam.edu.br/monitoria">Monitoria</a>
										</div>
										<div>
											&nbsp;
										</div>
							</td>
							
							<td style="text-align: left; vertical-align: top;">
										<div>
											<a href="http://www.protec.ufam.edu.br/">Pr&oacute;-Reitoria de Inova&ccedil;&atilde;o Tecnol&oacute;gica</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/orientacoespesquisador">Orienta&ccedil;&otilde;es Pesquisador</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/portfolio">Portif&oacute;lio</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/artigos">Artigos</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/eventos">Eventos</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/editais">Editais de Inova&ccedil;&atilde;o</a>
										</div>
										<div>
											<a href="http://www.protec.ufam.edu.br/guia-e-inpi">Manual de Inova&ccedil;&atilde;o e Propriedade Intelectual</a>
										</div>
							</td>
							
							<td style="text-align: left; vertical-align: top;">
										<div>
											<a href="/?option=com_content&amp;view=article&amp;id=624">Di&aacute;rias e Passagens</a>
										</div>
										<div>
											<a href="http://biblioteca.ufam.edu.br">S</a><a href="http://biblioteca.ufam.edu.br/">istema de Biblioteca</a><a href="http://biblioteca.ufam.edu.br/">s</a>
										</div>
										<div>
											<a href="/?option=com_content&amp;view=article&amp;id=6&amp;Itemid=127">Prefeitura do Campus</a>
										</div>
										<div>
											<a href="http://www.proplan.ufam.edu.br/">Processos de Contas Anuais</a>
										</div>
							</td>
						</tr>
						<tr> <td>                 </td></tr>

						<tr>
							<td style="text-align: left; vertical-align: top;">
										<div>
											<a href="http://www.propesp.ufam.edu.br/pos-graduacao/programas-de-pos-graduacao">Cursos de P&oacute;s-gradua&ccedil;&atilde;o</a>
										</div>
										<a href="http://www.propesp.ufam.edu.br/editais-de-pos-graduacao">Editais de P&oacute;s-gradua&ccedil;&atilde;o</a>
										<div>
											<a href="http://www.propesp.ufam.edu.br/editais-de-iniciacao-cientifica">Editais de Pesquisa </a>
										</div>
										<div>
											<a href="http://www.propesp.ufam.edu.br/pos-graduacao/calendario-pos-graduacao">Calend&aacute;rio da P&oacute;s-Gradua&ccedil;&atilde;o</a>
										</div>
										<div>
											<a href="http://www.propesp.ufam.edu.br/">Pr&oacute;-Reitoria de Pesquisa P&oacute;s-Gradua&ccedil;&atilde;o</a>
										</div>
							</td>
							
							<td style="text-align: left; vertical-align: top;">
										<div>
											<a href="http://procomun.ufam.edu.br/">Pr&oacute;-Reitoria de Assuntos Comunit&aacute;rios</a>
										</div>
										<div>
											<a href="http://procomun.ufam.edu.br/depto-apoio-ao-servidor">Apoio ao Servidor</a><br />
										<div>
											<a href="http://procomun.ufam.edu.br/depto-apoio-ao-estudante">Apoio ao Aluno</a>
										</div>
										<div>
											<a href="http://procomun.ufam.edu.br/deptorecursos-humanos">Recursos Humanos</a>
										</div>
							</td>
							<td rowspan="2" style="text-align: left; vertical-align: top;">
										<div >
											Endere&ccedil;o: Av. General Rodrigo &nbsp;
										</div>
										<div >
											Oct&aacute;vio, 6200, Coroado I&nbsp;
										</div>
										<div >
											Cep: 69080-900
										</div>
										<div>
											3305-1480/8426-1963*
										</div>
										
							</td>
						</tr>		
				</table>
	</li>

</div>