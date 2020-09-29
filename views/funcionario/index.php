<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Funcionários';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this);
?>
<div class="funcionario-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('plus') . ' Funcionario', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>


    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
            ],

            [
                'attribute' => 'nome',
                'headerOptions' => ['class' => 'col-md-4 text-center'],
                
            ],

            [
                'attribute' => 'telefone',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],
            
            [
                'attribute' => 'id_cargo',
                'value' => 'cargo.nome',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],                      

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_cargo' => $model->id_cargo], ['title' => 'Editar']);
                    },
                    'delete' => function($url, $model) {
                        return html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_cargo' => $model->id_cargo], ['title' => 'Excluir'], ['data' => ['confirm' => 'Tem certeza que deseja excluir esse funcionário?']]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
