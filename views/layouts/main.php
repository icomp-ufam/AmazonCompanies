<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    

    NavBar::begin([
        'brandLabel' => 'Amazon Companies',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
        		// original 'class' => 'navbar-inverse navbar-fixed-top'
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    if(Yii::$app->user->getId() == '100'){ //Administrador
    	echo Nav::widget([
    			'encodeLabels' => false,
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/adm']],
    					['label' => 'Empresas',
    					'items' =>[
    					['label' => 'Cadastrar Dados', 'url' => ['caddadosemp']],
    					['label' => 'Listar Empresas Cadastradas', 'url' => ['listemp']],
    					]],
    					
    					['label' => 'Usuários',
    					'items' => [
    					['label' => 'Cadastrar', 'url' => ['/site/caduseradm']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => 'Listar', 'url' => ['/site/listusersadm']],
    					]],
    					['label' => 'Gerenciar',
    					'items' => [
    							'<li class="dropdown-header">Demonstrações</li>',
    							['label' => 'Tipos de Demonstração', 'url' => ['#']], 
    							['label' => 'Vincular Existentes', 'url' => ['#']],
    							'<li class="divider"></li>',
    							'<li class="dropdown-header">Índices</li>',
    							['label' => 'Tipos de Índice', 'url' => ['#']],
    							['label' => 'Cadastrar Índices', 'url' => ['#']],
    					]],
    					['label' => 'Notificações '. Html::tag('span', '15', ['class' => 'badge']),
    					'items' => [
    							['label' => Html::tag('span', '3', ['class' => 'badge']).' Análises', 'url' => ['/site/validanaadm']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => Html::tag('span', '3', ['class' => 'badge']).' Alteração de Dados', 'url' => ['validaltdados']],
    							['label' => Html::tag('span', '9', ['class' => 'badge']).' Cadastro', 'url' => ['/site/validcadadm']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/site/altcad']],
    					
    					 
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(																																																														 
    											'Sair (' . Yii::$app->user->identity->username . ')',
    											['class' => 'btn btn-link logout']
    											)
    									. Html::endForm()
    									. '</li>'
    									)
    			],
    	]);
    }else if (Yii::$app->user->getId() == '101'){ //Aluno
    	echo Nav::widget([
    	'encodeLabels' => false,
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/aluno']],
    					['label' => 'Empresas',
    					'items' =>[
    							['label' => 'Cadastrar Dados', 'url' => ['caddadosemp']],
    							['label' => 'Listar Empresas Cadastradas', 'url' => ['listemp']],
    					]],
    					['label' => 'Gerenciar',
    					'items' => [
    							['label' => 'Tipos de Demonstração', 'url' => '#'],
    							['label' => 'Tipos de Índice', 'url' => '#'],
    					]],
    					['label' => 'Notificações '. Html::tag('span', '3', ['class' => 'badge'])],
    					['label' => 'Seu Perfil', 'url' => ['/site/altcad']],
    					['label' => 'Sobre', 'url' => ['/site/about']],
    					 
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(
    											'Sair (' . Yii::$app->user->identity->username . ')',
    											['class' => 'btn btn-link logout']
    											)
    									. Html::endForm()
    									. '</li>'
    									)
    			],
    	]);
    }else if (Yii::$app->user->getId() == '102'){ //Empresa
    	echo Nav::widget([
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/empresa']],
    					['label' => 'Empresas',
    					'items' =>[
    							['label' => 'Cadastrar Informações', 'url' => ['cadinfoemp']],
    							['label' => 'Listar Empresas Cadastradas', 'url' => ['listemp']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/site/altcademp']],
    					['label' => 'Sobre', 'url' => ['/site/about']],
    					
    					
    					Yii::$app->user->isGuest ? (
    							['label' => 'Entrar', 'url' => ['/site/login']]
    							) : (
    									'<li>'
    									. Html::beginForm(['/site/logout'], 'post')
    									. Html::submitButton(
    											'Sair (' . Yii::$app->user->identity->username . ')',
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
            	['label' => 'Empresas', 'url' => ['/site/listempvis']],
            	['label' => 'Contato', 'url' => ['/site/contact']],
            	['label' => 'Sobre', 'url' => ['/site/about']],
            	
        	
            	Yii::$app->user->isGuest ? (
                	['label' => 'Entrar', 'url' => ['/site/login']]
            	) : (
                	'<li>'
                	. Html::beginForm(['/site/logout'], 'post')
                	. Html::submitButton(
                    	'Sair (' . Yii::$app->user->identity->username . ')',
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
