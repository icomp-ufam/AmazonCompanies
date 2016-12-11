<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

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
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    if(Yii::$app->user->getIdentificadorPessoa() == '1'){ //Administrador
    	echo Nav::widget([
    			'encodeLabels' => false,
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
    					['label' => 'Página Inicial', 'url' => ['/site/adm']],
    					['label' => 'Empresas',
    					'items' =>[
    					['label' => 'Cadastrar Dados', 'url' => ['caddadosemp']],
    					['label' => 'Listar Empresas Cadastradas', 'url' => ['empresa/index']],
    					]],
    					
    					['label' => 'Usuários',
    					'items' => [
    					['label' => 'Cadastrar', 'url' => ['/site/caduseradm']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => 'Listar', 'url' => ['/site/listusersadm']],
    					]],
    					['label' => 'Notificações '. Html::tag('span', '15', ['class' => 'badge']),
    					'items' => [
    							['label' => Html::tag('span', '3', ['class' => 'badge']).' Análises', 'url' => ['/site/validanaadm']],
    							//'<li class="divider"></li>',
    							//'<li class="dropdown-header">Dropdown Header</li>',
    							['label' => Html::tag('span', '3', ['class' => 'badge']).' Alteração de Dados', 'url' => ['validaltdados']],
    							['label' => Html::tag('span', '9', ['class' => 'badge']).' Cadastro', 'url' => ['/usuario/']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/site/altcad']],
    					
    					 
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
    					['label' => 'Empresas',
    					'items' =>[
    							['label' => 'Cadastrar Dados', 'url' => ['caddadosemp']],
    							['label' => 'Listar Empresas Cadastradas', 'url' => ['empresa/index']],
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
    							['label' => 'Cadastrar Informações', 'url' => ['cadinfoemp']],
    							['label' => 'Listar Empresas Cadastradas', 'url' => ['empresa/index']],
    					]],
    					['label' => 'Seu Perfil', 'url' => ['/site/altcademp']],
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
            	['label' => 'Empresas', 'url' => ['/site/empresa/index']],
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
