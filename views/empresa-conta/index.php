<?php

use yii\helpers\Html;
use yii\helpers\url;
use kartik\grid\GridView;

$this->title = 'Validar alteração de Dados';

?>
<?php $this->params['breadcrumbs'][] = $this->title;?>
<div class="empresa-conta-index">
    
    <h2><strong><?= Html::encode($this->title) ?></strong></h2>
    <br>
    

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
 
      'columns' => [
          //'id',
            'ano' ,
            'idEmpresa0.nome',
            

            'idUsuario0.nome' ,
            
            
            'idConta0.nome' ,
            
            'valor' ,
            //'statusValidacao' ,   

        
          [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'Validar/Invalidar',
            'template' => '{activate}{deactivate}',
            'buttons' => [
              'deactivate' => function ($url, $model) {
                if($model->statusValidacao == '1'){
                  return Html::a('<span class = "glyphicon glyphicon-ok" style="color:green;"</span>', $url, [
                      'title' => 'Desativar',
                      'data' => [
                          'confirm' => 'Deseja invalidar esta alteração de dados ?'
                      ]
                  ]);
                }
              },
              'activate' => function ($url, $model) {
                if($model->statusValidacao == '0'){
                  return Html::a('<span class = "glyphicon glyphicon-remove" style="color:red;"</span>', $url, [
                      'title' => 'Ativar',
                      'data' => [
                          'confirm' => 'Deseja validar esta alteração de dados '. ' ?',
                      ]
                  ]);
                }else if($model->statusValidacao == '2'){
                  return Html::a('<span class = "glyphicon glyphicon-alert" style="color:orange;"</span>', $url, [
                      'title' => 'Pendente',
                      'data' => [
                          'confirm' => 'Deseja validar esta alteração de dados ?',
                      ]
                  ]);
                }
              }
            ],
            
            'urlCreator' => function ($action, $model, $key, $index){
              if($action == 'activate' || $action == 'deactivate'){
                    $url = Url::toRoute(['status', 'id' => $model->id]);
                    return $url;
              }
            }
            
          ],
          [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'Apagar',
            'template' => '{delete}'
          ],

        ],

    ]); ?>

</div>
