<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prioridades';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="prioridade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('plus') . ' Prioridade', ['create'], ['class' => 'btn btn-primary']) ?>
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
                'attribute' => 'descricao',
            ],
            
            [
                'attribute' => 'cor',
            ],
            
            [
                'attribute' => 'previsao_tempo',
                'value' => function ($model) {
                    return $model->previsao_tempo . ' minuto(s)';
                }
            ],
            
            [
                'attribute' => 'prioridade',
            ],
            

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id], ['title' => 'Excluir']);
                    },
                    'update' => function($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id], ['title' => 'Editar']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
