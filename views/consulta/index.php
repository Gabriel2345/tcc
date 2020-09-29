<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
            ],
            
            [
                'attribute' => 'id_funcionario',
            ],                       

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_paciente' => $model->id_paciente], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_paciente' => $model->id_paciente], ['title' => 'Excluir']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
