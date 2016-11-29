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
        	if (Yii::$app->user->getId() == '102'){
        		return $this->redirect(array ('/site/empresa'));
        	}else if (Yii::$app->user->getId() == '100'){
        		return $this->redirect(array ('/site/adm'));
        	}else if (Yii::$app->user->getId() == '101'){
        		return $this->redirect(array ('/site/aluno'));
        	}else{
        		return $this->goHome();
        	}
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
    
    // feito por mim LG
    
    public function actionAdm()
    {
    	return $this->render('adm');
    }
    
    public function actionValidcadadm()
    {
    	return $this->render('validcadadm');
    }
    
    public function actionValidanaadm()
    {
    	return $this->render('validanaadm');
    }
    
    public function actionListempvis()
    {
    	return $this->render('listempvis');
    }
    
    public function actionListemp()
    {
    	return $this->render('listemp');
    }
    
    public function actionListusersadm()
    {
    	return $this->render('listusersadm');
    }
    
    public function actionCaduseradm()
    {
    	return $this->render('caduseradm');
    }
    
    public function actionAltcad()
    {
    	return $this->render('altcad');
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
