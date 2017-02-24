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
use kartik\mpdf\Pdf;



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
    
    		$field[$i]['type'] = 'bar';
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
    							//                 //         'type' => 'bar',
    							//                 //         'name' => '2014',
    							//                 //         'data' => array(3, 2),
    							//                 //     ),
    							//                 //     array(
    							//                 //         'type' => 'bar',
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
        $verificaPreenchimento = 1;
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

            Yii::trace("my array");
            Yii::trace($myarray);
            Yii::trace(count($myarray));

        	//$idUsuario = Yii::$app->user->getId();
            //Yii::trace($idUsuario);
        	 for ($i = 0; $i < count($myarray); $i++) {
        	$model = new EmpresaConta();
        
        	$nome = $myarray[$i]['Nome'];
        	$conta = Conta::find()->select("*")->where(['nome' => $nome])->one();
            Yii::trace("id conta");
        	Yii::trace($conta->idConta);
                        Yii::trace("obrigatorio");

        
        	$valor = $myarray[$i]['Valor'];
        	$ano = $myarray[$i]['Ano'];
        	$model->idEmpresa = $id;
            $model->idUsuario = 6;
        	$model->ano = $ano;
        	$model->valor = $valor;
            $model->statusValidacao=0;
        	$model->idConta = $conta->idConta;
            if($conta->obrigatorio==1){
                if($valor!=null){
                    Yii::trace($conta->obrigatorio);
                    ($model->save());
                }else{
                    $verificaPreenchimento=2;
                }

            }else{
                ($model->save());

            }
        
        		 
        	 }
        }

        if($verificaPreenchimento==2){
            //mostrar mensagem avisando que não foram cadastrados algumas informações para estava null
        }
        $contas = Conta::find()->select('*')->all();
        $i=0;
        foreach($contas as $conta){
        
        	$categorias[$i]=$conta->nome;
        	$i++;
        
        }
         
        $anosEmpresas = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->where(['idEmpresa' => $id])->all();
        $i=0;
        $contador = 0;
        
        if($anosEmpresas){
        foreach($anosEmpresas as $anosEmpresa){
        
        	$field[$i]['type'] = 'bar';
        	$field[$i]['name'] = $anosEmpresa->ano;
        	
        	for ($j=0; $j <24 ; $j++) { // percorre cada uma das demonstrações, do ano atual do foreach
        		$con = Conta::find()->select('idConta')->where(['nome' => $categorias[$j]])->one();
        		$valore = EmpresaConta::find()->select('valor')->where(['idConta' => $con])->andWhere(['ano' =>$anosEmpresa->ano])->andWhere(['idEmpresa' => $id])->one();
        		if($valore){
        			$data[$j] = $valore->valor;
        			$contador++;
        		}else{
        			$data[$j]= 0;
        		}
        	}
        	
        	$field[$i]['data'] = $data;
        	$i++;
        	}
        }else{ // caso não tenha nenhum dado
        	$field[0]['type'] = 'bar';
        	$field[0]['name'] = 'Sem Dados Cadastrados';
        	$field[0]['data'] = 0;
        }
        		
      $model = $this->findModel($id);

        $comentario->Empresa_idEmpresa = $model->idEmpresa;
        

        if ($comentario->load(Yii::$app->request->post()) && $comentario->save())  {
            return $this->redirect(['view', 'id' => $model->idEmpresa]);
        }
        
        //sessão de variáveis usadas nos foreach na view
        $anos = EmpresaConta::find()->select('ano')->distinct()->orderBy(["ano"=> SORT_ASC])->where(['idEmpresa' => $id])->all();


                 return $this->render('view', [
                 	'anos' => $anos,
                    'model' => $this->findModel($id),
                    'comentario' => $comentario ,
                 	'field' => $field,
                 	'categorias' => $categorias,
                 	'contador' => $contador // para tamanho do gráfico
                    ]);

        
    }

     public function actionUpdate($id) {
        $model = $this->findModel($id);
        $file = \yii\web\UploadedFile::getInstance($model, 'logotipo');
        $fileArquivo = UploadedFile::getInstance($this->findModel($id), 'upload_file');
        if($this->findModel($id)->load(Yii::$app->request->post()) and $file != null)

        if ($this->findModel($id)->load(Yii::$app->request->post()) && $file != null) {

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


    public function actionGenerate_pdf() {
        $data = str_replace(' ', '+', Yii::$app->request->post('bin_data'));
        $name = Yii::$app->request->post('name');
        $data = base64_decode($data);
        
        $img_pre_path = 'temp/savechart/';
        $img_filename = 'chart-export-'.Yii::$app->security->generateRandomString().'.png';

        $pdf_pre_path = "export/empresa/";
        $pdf_filename = $name."-export-".Yii::$app->security->generateRandomString().'.pdf';

        $img_path = $img_pre_path.$img_filename;
        $pdf_path = $pdf_pre_path.$pdf_filename;

        if (!is_dir($img_pre_path)) {
            mkdir($img_pre_path, 0777, true);
        }

        if (!is_dir($pdf_pre_path)) {
            mkdir($pdf_pre_path, 0777, true);
        }

        $im = imagecreatefromstring($data);

        if ($im !== false) {
            // Save image in the specified location
            imagepng($im, $img_path);
            imagedestroy($im);
        }

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_FILE,
            'filename' => $pdf_path,
            // your html content input
            'content' => 
            '
            <h2 style="text-align: center;">AmazonCompanies</h2>
            <h4 style="text-align: center;">Dados da '.$name.'</h4>
            <br>
            <img src="'.$img_path.'">
            ',  
            //'cssInline' => '', 
             // set mPDF properties on the fly
            'options' => ['title' => $pdf_filename],
             // call mPDF methods on the fly
            'methods' => [ 
                /*
                'SetFooter'=>[''],
                */
            ]
        ]);

        $pdf->render();

        unlink(getcwd().'/'.$img_path);

        echo $pdf_path;
    }

    
}
