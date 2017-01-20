<?php

namespace app\controllers;

use Yii;
use app\models\Indice;
use app\models\IndiceSearch;
use app\models\Conta;
use app\models\EmpresaConta;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \Fintara\Tools\Calculator\Calculator;
use \Fintara\Tools\Calculator\DefaultLexer;
/**
 * IndiceController implements the CRUD actions for Indice model.
 */
class IndiceController extends Controller
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
     * Lists all Indice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IndiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indice model.
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
     * Creates a new Indice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Indice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idIndice]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Indice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idIndice]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPegar_tag(){
        $indice = Indice::find()->select('formula')->all();
        $calculator = new Calculator();
        $sinais = ['+', '-', '/', '*', '(', ')'];
        

        $concatenar='';
        $anterior;
        print_r(count($indice));
        echo '<br>';
        for ($j=0; $j < count($indice) ; $j++) { 
                    # code...
            $teste = preg_split('/[@]/',$indice[$j]->formula);

          
                    $concatenar='';
                    $anterior='';

          for ($i=0; $i <count($teste); $i++) {
            if(in_array($teste[$i],$sinais)){
                print_r('sim');
                                                echo '<br>';
                $anterior = $concatenar;
                $concatenar = $anterior.$teste[$i];

        }
        else{ 
                print_r($teste[$i]);
                
                print_r(" ");
            $conta = Conta::find()->select("idConta")->where(['chave' => $teste[$i]])->one();
                print_r($conta['idConta']);
                $idConta = $conta['idConta'];
                echo '<br>';
            $empresaConta = EmpresaConta::find()->select("valor")->where(['idConta' => $idConta])->one();
                print_r($empresaConta['valor']);
                $anterior = $concatenar;
                $concatenar = $anterior.$empresaConta['valor'];
                                echo '<br>';

        }


                

          }
         print_r($concatenar);
         echo '<br>';
        $calculator->setExpression($concatenar);
                 print_r($calculator->calculate());
                 echo '<br>';




        }        

          


   
            
        }

    /**
     * Deletes an existing Indice model.
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
     * Finds the Indice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Indice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Indice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
