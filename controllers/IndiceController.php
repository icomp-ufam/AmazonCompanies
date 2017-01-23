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

    public function actionCalc_indice(){

        $empresaP = $_POST['idEmpresa'];
        $indiceP = $_POST['idIndice'];
        print_r($empresaP);
        echo '<br>';
        print_r($indiceP);
        echo '<br>';
        $tabela = "<table class='table'>
                       <tr> ";
        
        $indice = Indice::find()->select('formula')->where(['idIndice' => $indiceP])->all();
        //$indice = Indice::find()->select('formula')->all();
        $calculator = new Calculator();
        $sinais = ['+', '-', '/', '*', '(', ')'];
        $concatenar='';
        $anterior;
                            $tabela .= "<th> $indice[0]->nomeIndice </th> ";
        $tabela.="</tr> ";


        for ($j=0; $j < count($indice) ; $j++) {

            $getChaveContas = preg_split('/[@]/',$indice[$j]->formula);
                    $concatenar='';
                    $anterior='';                            
                    $verificaSeEhNull=0;

            for ($i=0; $i <count($getChaveContas); $i++) {
                if(in_array($getChaveContas[$i],$sinais)){
                    $anterior = $concatenar;
                    $concatenar = $anterior.$getChaveContas[$i];

                }else{ 
                    print_r($getChaveContas[$i]);
                    $conta = Conta::find()->select("idConta")->where(['chave' => $getChaveContas[$i]])->one();
                    $idConta = $conta['idConta'];
                    $empresaConta = EmpresaConta::find()->select("valor")->where(['idConta' => $idConta])->andWhere(['ano' =>2016])->andWhere(['idEmpresa' =>$empresaP])->one();
                    if($empresaConta==null){
                        //print_r('@é null@');
                        $anterior = $concatenar;
                        $concatenar = $anterior.'@ehnull@';
                        $verificaSeEhNull = 1;

                        echo '<br>';


                    } else{
                        $anterior = $concatenar;
                    $concatenar = $anterior.$empresaConta['valor'];
                    echo '<br>';
                    }
                    
                }   

            }
            if($verificaSeEhNull==1){
                print_r('sim é null');
                echo '<br>';

            }else{
             print_r($concatenar);
             echo '<br>';
             $calculator->setExpression($concatenar);
                      print_r($calculator->calculate());
                      echo '<br>';
         }
        }

        $tabela.="</tr>
            </table>";

        //echo count($resultado);
        return $tabela;


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
