<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('arrow-left') . ' Voltar', ['consulta/index', 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Icon::show('plus') . ' Receita', ['create', 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center']
            ],

            [
                'attribute' => 'data',
                'format' => ['date', 'php: d/m/Y'],
                'headerOptions' => ['class' => 'col-md-3 text-center']
            ],
            
            [
                'attribute' => 'id_consulta',
                'headerOptions' => ['class' => 'col-md-5']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Receita',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{receita}',
                'buttons' => [
                    'receita' => function ($url, $model) {
                        return Html::a(Icon::show('file'), ['receita', 'id' => $model->id, 'id_consulta' => $model->id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['title' => 'Gerar receita'], ['target' => '@blank']);
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
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_fila' => Yii::$app->request->get('id_fila'), 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_fila' => Yii::$app->request->get('id_fila'), 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Excluir', 'data' => ['confirm' => 'Tem certeza que deseja excluir essa receita médica?']]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
