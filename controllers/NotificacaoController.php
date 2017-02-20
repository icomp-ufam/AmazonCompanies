<?php

namespace app\controllers;

use Yii;
use app\models\Notificacao;
use app\models\NotificacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotificacaoController implements the CRUD actions for Notificacao model.
 */
class NotificacaoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notificacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotificacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notificacao model.
     * @param integer $idNotificacao
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionView($idNotificacao, $Usuario_idUsuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idNotificacao, $Usuario_idUsuario),
        ]);
    }

    /**
     * Creates a new Notificacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notificacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate2()
    {
    	$model = new Notificacao();
    
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		// return $this->redirect(['view', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
    		return $this->redirect(['/analise/']);
    	} else {
    		return $this->render('create', [
    				'model' => $model,
    		]);
    	}
    }
    
    /**
     * Updates an existing Notificacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idNotificacao
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionUpdate($idNotificacao, $Usuario_idUsuario)
    {
        $model = $this->findModel($idNotificacao, $Usuario_idUsuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idNotificacao' => $model->idNotificacao, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notificacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idNotificacao
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionDelete($idNotificacao, $Usuario_idUsuario)
    {
        $this->findModel($idNotificacao, $Usuario_idUsuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notificacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idNotificacao
     * @param integer $Usuario_idUsuario
     * @return Notificacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idNotificacao, $Usuario_idUsuario)
    {
        if (($model = Notificacao::findOne(['idNotificacao' => $idNotificacao, 'Usuario_idUsuario' => $Usuario_idUsuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionStatus($id, $idUsuario, $edit)
    {
    	$model = $this->findModel($id, $idUsuario);
    
    	if($model->status != 2){
    		$model->status = 2;
    		$model->save();
    	}
    
    	if($edit == TRUE){
    		return $this->redirect(['/analise/update/', 'id' => $model->idAnalise]);
    	}
    	
    	return $this->redirect(['notificacao/index']);
    	 
    }
}
