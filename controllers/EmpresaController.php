<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\Array_;
use Yii;
use app\models\Empresa;
use app\models\EmpresaSearch;
use app\models\EmpresaConta;
use app\models\Conta;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\db\Query;
use yii\db\ActiveQuery;
use moonland\phpexcel\Excel;



/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */

    public function actionCarregado()
    {
    
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    ]);
             
    }

    public function actionGetDescricao(){
        print_r('entrou get descricao');
        $empresaP = $_POST['empresa'];
        $empresas = explode('#', $empresaP);
        $tabela = "<table class='table'>
                       <tr> ";
        foreach ($empresas as $empresa){
        //Pegando o nome da empresa
            $conectEmpresa = \Yii::$app->db;
            $queryEmpresa = 'SELECT nome FROM empresa WHERE idEmpresa = '.$empresa;
            $nomeEmpresa = $conectEmpresa->createCommand($queryEmpresa)->queryScalar();
            $tabela .= "<th> $nomeEmpresa </th> ";
        }
        $tabela.="</tr> ";
        //Pegando o nome da demonstração
        $tabela.="<tr> ";
        foreach ($empresas as $empresa) {
            $tabela.= "<td>";
            $connection = \Yii::$app->db;
            $query = 'SELECT tipoDemonstracao.nome, demonstracao.idDemonstracao
                  FROM demonstracao INNER JOIN tipoDemonstracao 
                  ON demonstracao.idtipoDemonstracao = tipoDemonstracao.idtipoDemonstracao 
                  WHERE demonstracao.Empresa_idEmpresa = ' . $empresa;
            $demonstracoes = $connection->createCommand($query)->queryAll();
            if(count($demonstracoes) > 0) {
                foreach ($demonstracoes as $result):
                    $tabela .= "<b> {$result['nome']}</b> </br>  ";
                    $connection2 = \Yii::$app->db;
                    $queryConta = "SELECT nome, valor FROM conta WHERE idDemonstracao = {$result['idDemonstracao']}";
                    $contas = $connection2->createCommand($queryConta)->queryAll();
                    if(count($contas)>0){
                        foreach ($contas as $ct){
                            $tabela .= "{$ct['nome']}: {$ct['valor']} <br>";
                        }
                    }else $tabela.= "Não há dados <br>";
                endforeach;
            }else $tabela.= "Empresa sem demonstrações <br> ";
            $tabela.="</td>";
        }
        $tabela.="</tr>
            </table>";

        //echo count($resultado);
        return $tabela;
        //SELECT nome, valor FROM conta WHERE idDemonstracao in
        // (SELECT idDemonstracao FROM demonstracao
        // INNER JOIN tipoDemonstracao ON demonstracao.idtipoDemonstracao = tipoDemonstracao.idtipoDemonstracao
        // WHERE demonstracao.Empresa_idEmpresa = 1)
        //SELECT tipoDemonstracao.nome FROM tipoDemonstracao ]
        //JOIN demonstracao ON tipoDemonstracao.idtipoDemonstracao= demonstracao.idtipoDemonstracao 
        //WHERE demonstracao.Empresa_idEmpresa = 1;*/
    }
    /**
     * Displays a single Empresa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){
        $file = UploadedFile::getInstance($this->findModel($id), 'upload_file');
        
        if($this->findModel($id)->load(Yii::$app->request->post()) and $file != null){
            $file->saveAs('uploads/'.$file->name);
           //print_r($file->name);


            $objPHPExcel = new Excel();

            $inputFileName = './uploads/'.$file->name;  // File to read
            
            try {
               $objPHPExcel = Excel::import($inputFileName);
            } catch(Exception $e) {
               die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
                $cont=1;
               $myarray = array_shift($objPHPExcel);
               
               for ($i = 0; $i < count($myarray); $i++) {
                    $model = new EmpresaConta();

                    $nome = $myarray[$i]['Nome'];
                    $conta = Conta::find()->select("idConta")->where(['nome' => $nome])->one();
                    print_r($conta->idConta);

                    $valor = $myarray[$i]['Valor'];
                    $ano = $myarray[$i]['Ano'];
                    $model->idEmpresa = $id;
                    $model->ano = $ano;
                    $model->valor = $valor;
                    
                    $model->idConta = $conta->idConta;

                   
                    $model->save();

                   
                }
        }
        

        


                 return $this->render('view', [
                    'model' => $this->findModel($id),
                    ]);
             

        
    }

    /**
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $model = new Empresa();
        $file = \yii\web\UploadedFile::getInstance($model, 'logotipo');

        if ($model->load(Yii::$app->request->post()) and $file != null){

            $model->logotipo = UploadedFile::getInstance($model, 'logotipo');
            $file->saveAs('img/'.$file->name);

            if($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->idEmpresa]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file = \yii\web\UploadedFile::getInstance($model, 'logotipo');

        if ($model->load(Yii::$app->request->post()) && $file != null) {

            $model->logotipo = UploadedFile::getInstance($model, 'logotipo');
            $file->saveAs('img/'.$file->name);

            if($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->idEmpresa]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     public function actionLoad_documento($id){

        
        $model = new EmpresaConta();

        $objPHPExcel = new Excel();

        $inputFileName = './uploads/documentosTeste.xlsx';  // File to read
        
        try {
           $objPHPExcel = Excel::import($inputFileName);
        } catch(Exception $e) {
           die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
            $cont=1;
           $myarray = array_shift($objPHPExcel);
           
           for ($i = 0; $i < count($myarray); $i++) {
                $model = new EmpresaConta();

                $nome = $myarray[$i]['Nome'];
                $conta = Conta::find()->select("idConta")->where(['nome' => $nome])->one();
                print_r($conta->idConta);

                $valor = $myarray[$i]['Valor'];
                $ano = $myarray[$i]['Ano'];
                $model->idEmpresa = $id;
                $model->ano = $ano;
                $model->valor = $valor;
                
                $model->idConta = $conta->idConta;

               
                $model->save();

               
            }


      

             if($model->save()) {
                 return $this->redirect(['view', 'id' => $idEmpresa]);
             }



    }

   


    /**
     * Deletes an existing Empresa model.
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
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
