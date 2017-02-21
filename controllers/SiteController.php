<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        		
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
        		return $this->goHome();
       }

        $model = new LoginForm();
        
        // se ok, vai redirecionar para as paginas principais dependendo do tipo de usuario (adm, aluno, empresa)
        if ($model->load(Yii::$app->request->post()) && $model->login()) { 
        	
        	if(Yii::$app->user->identity->getAtivo() == 1){ // se ele estiver ativo
        		if(Yii::$app->user->identity->getIdentificadorPessoa() == 1){ // se ele for tipo 1 = Administrador
        			return $this->redirect(array('site/adm'));
        		}else if(Yii::$app->user->identity->getIdentificadorPessoa() == 2){ // se ele for tipo 2 = Aluno
        			return $this->redirect(array('site/aluno'));
        		}else if (Yii::$app->user->identity->getIdentificadorPessoa() == 3){
        			return $this->redirect(array('site/empresa')); // se ele for tipo 3 = Empresa
        		}
        	}else{ 
        		Yii::$app->user->logout();
        		Yii::$app->session->setFlash('danger', "Usuário com Cadastro Bloqueado!");
        		// enviar uma msg de usuário não ativo?
        	}
        	
        }
        
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    // renderizando páginas em html (prototipo)
    
    public function actionAdm()
    {
    	return $this->render('adm');
    }
    
    public function actionListempvis()
    {
    	return $this->render('listempvis');
    }
    
    public function actionAltcademp()
    {
    	return $this->render('altcademp');
    }
    
    public function actionCaddadosemp()
    {
    	return $this->render('caddadosemp');
    }
	
    public function actionCadinfoemp()
    {
    	return $this->render('cadinfoemp');
    }
    
    public function actionValidaltdados()
    {
    	return $this->render('validaltdados');
    }
    
    public function actionRecnotaluno()
    {
    	return $this->render('recnotaluno');
    }
    
    public function actionAluno()
    {
    	return $this->render('aluno');
    }
    
    public function actionEmpresa()
    {
    	return $this->render('empresa');
    }
}
