<?php

namespace app\controllers;

use Yii;
use app\models\Analise;
use app\models\AnaliseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Notificacao;

/**
 * AnaliseController implements the CRUD actions for Analise model.
 */
class AnaliseController extends Controller
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
     * Lists all Analise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnaliseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Analise model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Analise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Analise();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idanalise]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Analise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->idanalise]);
        } else {
            return $this->render('update', [
                'model' => $model,

            ]);
        }
    }
	
    public function actionAtivar($id)
    {
    	$model = $this->findModel($id);
    	$model->status = '1';
    	$model->save(false);
    	
    	//notificando alundo pela validação
    	$notificacao = new Notificacao;
    	$notificacao->idAnalise = $model->idanalise;
    	$notificacao->Usuario_idUsuario = $model->Usuario_idUsuario;
    	$notificacao->status = '1';
    	$notificacao->conteudo = 'Sua análise foi aceita!';
    	$notificacao->tipo = '0';
    	$notificacao->save();
    	
    	return $this->redirect(['/analise/index']);
    }
    
    public function actionDesativar($id)
    {
    	$model = $this->findModel($id);
    	$model->status = '0';
    	$model->save(false);
    	 
    	return $this->redirect(['/notificacao/create2', 'idAnalise' => $model->idanalise, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
    }
    
    
    /**
     * Deletes an existing Analise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Analise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Analise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Analise::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
}
