<?php

namespace app\controllers;

use Yii;
use app\models\Comentario;
use app\models\ComentarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComentarioController implements the CRUD actions for Comentario model.
 */
class ComentarioController extends Controller
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
     * Lists all Comentario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComentarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comentario model.
     * @param integer $idComentario
     * @param integer $Empresa_idEmpresa
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionView($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario),
        ]);
    }

    /**
     * Creates a new Comentario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comentario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idComentario' => $model->idComentario, 'Empresa_idEmpresa' => $model->Empresa_idEmpresa, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comentario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idComentario
     * @param integer $Empresa_idEmpresa
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionUpdate($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario)
    {
        $model = $this->findModel($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idComentario' => $model->idComentario, 'Empresa_idEmpresa' => $model->Empresa_idEmpresa, 'Usuario_idUsuario' => $model->Usuario_idUsuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Comentario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idComentario
     * @param integer $Empresa_idEmpresa
     * @param integer $Usuario_idUsuario
     * @return mixed
     */
    public function actionDelete($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario)
    {
        $this->findModel($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comentario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idComentario
     * @param integer $Empresa_idEmpresa
     * @param integer $Usuario_idUsuario
     * @return Comentario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idComentario, $Empresa_idEmpresa, $Usuario_idUsuario)
    {
        if (($model = Comentario::findOne(['idComentario' => $idComentario, 'Empresa_idEmpresa' => $Empresa_idEmpresa, 'Usuario_idUsuario' => $Usuario_idUsuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
