<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastro de pacientes';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="paciente-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('plus') . ' Paciente', ['create'], ['class' => 'btn btn-primary']) ?>
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
                'attribute' => 'nome',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],

            [
                'attribute' => 'endereco',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],
            
            [
                'attribute' => 'telefone',
                'headerOptions' => ['class' => 'col-md-2 text-center'],
            ],                  
            
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete} {adicionarfila}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['title' => 'Excluir']);
                    },
                    'adicionarfila' => function($url, $model) {
                        return Html::a(Icon::show('plus'), ['paciente/adicionar-fila', 'id_paciente' => $model->id], ['title' => 'Incluir na fila de espera']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
