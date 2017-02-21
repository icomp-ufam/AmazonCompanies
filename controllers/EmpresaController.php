<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\Array_;
use Yii;
use app\models\Empresa;
use app\models\EmpresaSearch;
use app\models\EmpresaConta;
use app\models\Conta;
use app\models\Comentario;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\db\Query;
use yii\db\ActiveQuery;
use moonland\phpexcel\Excel;
use miloschuman\highcharts\Highcharts;



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
                    'generate_pdf' => ['POST'],
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

    public function actionGet_descricao(){
    	$contas = Conta::find()->select('*')->all();
    	$i=0;
    	foreach($contas as $conta){
    
    		$categorias[$i]=$conta->nome;
    		$i++;
    
    	}
    	 
    	$anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
    	$i=0;
    
    	foreach($anosEmpresas as $anosEmpresa){
    
    		$field[$i]['type'] = 'column';
    		$field[$i]['name'] = $anosEmpresa->ano;
    		// $valoress = EmpresaConta::find()->select('valor')->where(['idConta' => $conta->idConta])->andWhere(['ano' =>$anosEmpresa->ano])->all();
    		// if(count($valoress)>0){
    		//     $j=0;
    			//     foreach($valoress as $valores){
    			//         $data[$j] =
    				//     }
    			// } else{
    
    			// }
    			for ($j=0; $j <24 ; $j++) {
    				$data[$j]= $j+1;
    
    			}
    			$field[$i]['data'] = $data;
    			$i++;
    
    
    			}
    
    			// print_r($field);
    			// echo '<br>';
    			// print_r($categorias);
    
    
    			// echo Highcharts::widget([
    			//     'scripts' => array(
    			//                 'modules/exporting',
    					//                 'themes/grid-light',
    					//             ),
    					//             'options' => array(
    					//                 'title' => array(
    							//                     'text' => 'Demonstração',
    							//                 ),
    							//                 'xAxis' => array(
    							//                     'categories' => $categorias,
    									//                 ),
    
    							//                 'series' => $field
    							//                 // array(
    							//                 //     array(
    							//                 //         'type' => 'column',
    							//                 //         'name' => '2014',
    							//                 //         'data' => array(3, 2),
    							//                 //     ),
    							//                 //     array(
    							//                 //         'type' => 'column',
    							//                 //         'name' => '2016',
    							//                 //         'data' => array(2, 3),
    							//                 //     ),
    
    							//                 // ),
    							//             )
    							//         ]);
    
    			// return $this->render('index', [
    					//                     'model' => $model,
    					//                     'field' => $field,
    					//                     'categorias' => $categorias
    					//                     ]);
    					 
    
    
    
    
    					// print_r('entrou get descricao');
    					// $empresaP = $_POST['empresa'];
    					// $empresas = explode('#', $empresaP);
    					// $tabela = "<table class='table'>
    					//                <tr> ";
    					// foreach ($empresas as $empresa){
    					// //Pegando o nome da empresa
    						//     $conectEmpresa = \Yii::$app->db;
    						//     $queryEmpresa = 'SELECT nome FROM empresa WHERE idEmpresa = '.$empresa;
    						//     $nomeEmpresa = $conectEmpresa->createCommand($queryEmpresa)->queryScalar();
    						//     $tabela .= "<th> $nomeEmpresa </th> ";
    						// }
    						// $tabela.="</tr> ";
    						// //Pegando o nome da demonstração
    						// $tabela.="<tr> ";
    						// foreach ($empresas as $empresa) {
    			//     $tabela.= "<td>";
    			//     $connection = \Yii::$app->db;
    			//     $query = 'SELECT tipoDemonstracao.nome, demonstracao.idDemonstracao
    			//           FROM demonstracao INNER JOIN tipoDemonstracao
    			//           ON demonstracao.idtipoDemonstracao = tipoDemonstracao.idtipoDemonstracao
    			//           WHERE demonstracao.Empresa_idEmpresa = ' . $empresa;
    			//     $demonstracoes = $connection->createCommand($query)->queryAll();
    			//     if(count($demonstracoes) > 0) {
    			//         foreach ($demonstracoes as $result):
    			//             $tabela .= "<b> {$result['nome']}</b> </br>  ";
    			//             $connection2 = \Yii::$app->db;
    			//             $queryConta = "SELECT nome, valor FROM conta WHERE idDemonstracao = {$result['idDemonstracao']}";
    			//             $contas = $connection2->createCommand($queryConta)->queryAll();
    			//             if(count($contas)>0){
    			//                 foreach ($contas as $ct){
    			//                     $tabela .= "{$ct['nome']}: {$ct['valor']} <br>";
    				//                 }
    				//             }else $tabela.= "Não há dados <br>";
    				//         endforeach;
    				//     }else $tabela.= "Empresa sem demonstrações <br> ";
    				//     $tabela.="</td>";
    				// }
    			// $tabela.="</tr>
    			//     </table>";
    
    			// //echo count($resultado);
    			// return $tabela;
    			// //SELECT nome, valor FROM conta WHERE idDemonstracao in
    			// // (SELECT idDemonstracao FROM demonstracao
    			// // INNER JOIN tipoDemonstracao ON demonstracao.idtipoDemonstracao = tipoDemonstracao.idtipoDemonstracao
    			// // WHERE demonstracao.Empresa_idEmpresa = 1)
    			// //SELECT tipoDemonstracao.nome FROM tipoDemonstracao ]
    			// //JOIN demonstracao ON tipoDemonstracao.idtipoDemonstracao= demonstracao.idtipoDemonstracao 
    			// //WHERE demonstracao.Empresa_idEmpresa = 1;*/
    }
    /**
     * Displays a single Empresa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){

        $comentario = new Comentario();

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
        $contas = Conta::find()->select('*')->all();
        $i=0;
        foreach($contas as $conta){
        
        	$categorias[$i]=$conta->nome;
        	$i++;
        
        }
         
        $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->all();
        $i=0;
        
        foreach($anosEmpresas as $anosEmpresa){
        
        	$field[$i]['type'] = 'column';
        	$field[$i]['name'] = $anosEmpresa->ano;
        	// $valoress = EmpresaConta::find()->select('valor')->where(['idConta' => $conta->idConta])->andWhere(['ano' =>$anosEmpresa->ano])->all();
        	// if(count($valoress)>0){
        	//     $j=0;
        		//     foreach($valoress as $valores){
        		//         $data[$j] =
        			//     }
        		// } else{
        
        		// }
        		for ($j=0; $j <24 ; $j++) {
        			$data[$j]= $j+1;
        
        		}
        		$field[$i]['data'] = $data;
        		$i++;
        
        
        		}
        		// print_r(count($anosEmpresas));
        
        		// for ($i = 0; $i <= 2; $i++) {
        		//     $field[$i]['type'] = 'column';
        		//     $field[$i]['name'] = '201' . $i+4;
        		//     for ($j=0; $j <24 ; $j++) {
        		//          $data[$j]= $j+1;
        
        			//     }
        			//                     $field[$i]['data'] = $data;
        
        
        			// }
        			//print_r(count($categorias));
        			// echo '<br>';
        			// for ($i=0; $i <= 5 ; $i++) {
        			//     $categorias[$i]='Ativo Total'.$i;
        				// }
        				// print_r($categorias);
        
        				// $series = [
        				// [
        				//         'type' => 'column',
        				//         'name' => '2014',
        				//         'data'=> [3, 2]
        				//     ],
        
        				// [
        				//         'type' => 'column',
        
        				//         'name'=> '2016',
        				//         'data'=> [2, 3]
        				//     ],
        
        				// ];
        
        				// print_r($field);
        				// echo '<br>';
        				// print_r($series);
        		//print_r($categorias);
      $model = $this->findModel($id);

        $comentario->Empresa_idEmpresa = $model->idEmpresa;
        

        if ($comentario->load(Yii::$app->request->post()) && $comentario->save())  {
            return $this->redirect(['view', 'id' => $model->idEmpresa]);
        }


                 return $this->render('view', [
                    'model' => $this->findModel($id),
                    'comentario' => $comentario ,
                 	'field' => $field,
                 	'categorias' => $categorias
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


    public function actionGenerate_pdf($bin_data) {
        $data = str_replace(' ', '+', $bin_data);
        $data = base64_decode($data);
        //$fileName = date('ymdhis').'.png';
        $fileName = 'salvou.png';
        $im = imagecreatefromstring($data);
        
        Yii::trace("Cheguei aqui!!!");
        if ($im !== false) {
            Yii::trace("Passei do if!!!");

            // Save image in the specified location
            imagepng($im, $fileName);
            imagedestroy($im);
            //echo "Saved successfully";
        }
    }

    
}
