<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

//die(var_dump($triagem->paciente));
$this->title = 'Gerenciar Consultas';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="consulta-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo html::a(Icon::show('arrow-left') . ' Voltar', ['/fila-espera/index'], ['class' => 'btn btn-danger']) ?>
        <?php echo Html::a(Icon::show('plus') . ' Consulta', ['create', 'id_paciente' => Yii::$app->request->get('id_paciente')], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="panel panel-default">
    <div class="panel-heading">Informações da triagem</div>
    <div class="panel-body">
        <dl>
            <dt>Nome</dt>
            <dd><?php echo $triagem->paciente->nome; ?></dd>
            <dt>Temperatura</dt>
            <dd><?php echo $triagem->temp; ?></dd>
            <dt>Pressão arterial sistólica</dt>
            <dd><?php echo $triagem->pas; ?></dd>
            <dt>Pressão arterial diastólica</dt>
            <dd><?php echo $triagem->pad; ?></dd>
            <dt>Saturação</dt>
            <dd><?php echo $triagem->sat; ?></dd>
        </dl>
    
    </div>
</div>

        
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],

                    [
                        'attribute' => 'id_paciente',
                        'value' => 'paciente.nome'
                    ],
            
                    [
                        'attribute' => 'id_funcionario',
                        'value' => 'funcionario.nome',
                        'headerOptions' => ['class' => 'col-md-4']
                    ],
                    
                    [
                        'label' => 'Atestado',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model, $key, $index, $column) {
                            return Html::a(Icon::show('clipboard'), ['/atestado/index', 'id_consulta' => $model->id, 'id_paciente' => $model->id_paciente]);
                        },
                        'format' => 'html'

                    ],

                    [
                        'label' => 'Receita',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'value' => function ($model, $key, $index, $column) {
                            return Html::a(Icon::show('clipboard'), ['/receita/index', 'id_consulta' => $model->id, 'id_paciente' => $model->id_paciente]);
                        },
                        'format' => 'html'
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['class' => 'col-md-1 text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_fila' => Yii::$app->request->get('id_fila'), 'id_paciente' => $model->id_paciente], ['title' => 'Editar']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_paciente' => $model->id_paciente], ['title' => 'Excluir'], ['data' => ['confirm' => 'Tem certeza que deseja excluir essa consulta?']]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        
</div>
