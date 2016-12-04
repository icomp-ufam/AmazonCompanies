<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {
        	// instantiate your usuario model for saving
        	$_id = $_POST['editableKey'];
        	$model = $this->findModel($_id);
        
        	// store a default json response as desired by editable
        	$out = Json::encode(['output'=>'treze', 'message'=>'Pronto!']);
        
        	// fetch the first entry in posted data (there should only be one entry
        	// anyway in this array for an editable submission)
        			// - $posted is the posted data for Book without any indexes
        			// - $post is the converted array for single model validation
        			$posted = current($_POST['Usuario']);
        			$post = ['Usuario' => $posted];
        
        			// load model like any single model validation
        			if ($model->load($post)) {
        				// can save model or do something before saving model
        				$model->save();
        
        				// custom output to return to be displayed as the editable grid cell
        				// data. Normally this is empty - whereby whatever value is edited by
        				// in the input by user is updated automatically.
        				$output = '';
        
        				// specific use case where you need to validate a specific
        				// editable column posted when you have more than one
        				// EditableColumn in the grid view. We evaluate here a
        				// check to see if buy_amount was posted for the Book model
        		//		if (isset($posted['ativo'])) {
        		//			$output = Yii::$app->formatter->asInteger($model->ativo, 2);
        		//		}
        
        				// similarly you can check if the name attribute was posted as well
        				// if (isset($posted['name'])) {
        				// $output = ''; // process as you need
        					// }
        				//	$out = Json::encode(['output'=>$output, 'message'=>'teste2']);
        			}
        			// return ajax json encoded response and exit
        			echo $out;
        			return;
        }
        
        
        
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUsuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idUsuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
    
    public function actionValidcadadm()
    {
    	return $this->render('validcadadm');
    }
}
