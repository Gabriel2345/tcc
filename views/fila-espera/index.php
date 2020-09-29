<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fila de espera';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="fila-espera-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('plus') . ' Incluir Paciente', ['paciente/index'], ['class' => 'btn btn-primary']) ?>
    </p>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id_status',
                'value' => 'status.descricao',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],

            [
                //'attribute' => 'prioridade',
                'label' => 'Prioridade',
                'value' => function($model) {
                    return $model->triagem->prioridade->cor;
                },
                'headerOptions' => ['class' => 'col-md-1 text-center'],
            ],

            [
                'attribute' => 'hora_chegada',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
            ],

            [
                'attribute' => 'data',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
            ],

            [
                'attribute' => 'id_paciente',
                'value' => 'paciente.nome',
            ],
            
            [
                'attribute' => 'Triagem',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model, $key, $index, $column) {
                    return html::a(Icon::show('notes-medical'), ['/triagem/index', 'id_paciente' => $model->id]);
                },
                'format' => 'html',
            ],

            [
                'label' => 'Consulta',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(Icon::show('user-md'), ['/consulta/index', 'id_paciente' => $model->id]);
                },
                'format' => 'html',
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function($url, $model) {
                        return html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['title' => 'Excluir']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
