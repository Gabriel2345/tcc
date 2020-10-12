<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Atestados';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="atestado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('arrow-left') . ' Voltar', ['consulta/index', 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_paciente' => Yii::$app->request->get('id_paciente')], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Icon::show('plus') . ' Atestado', ['create', 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_paciente' => Yii::$app->request->get('id_paciente') ], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                'attribute' => 'data',
                'format' => ['date', 'php:d/m/Y'],
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],

            [
                'attribute' => 'id_consulta',
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Atestado',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{atestado}',
                'buttons' => [
                    'atestado' => function ($url, $model) {
                        return Html::a(Icon::show('file'), ['atestado', 'id' => $model->id, 'id_consulta' => $model->id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Gerar atestado'], ['target' => '@blank']);
                    }
                ]
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_consulta' => $model->id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_consulta' => $model->id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente')]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
