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
        <?= Html::a(Icon::show('plus') . ' Receita', ['create'], ['class' => 'btn btn-primary']) ?>
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
                'headerOptions' => ['class' => 'col-md-3 text-center']
            ],
            
            [
                'attribute' => 'id_consulta',
                'headerOptions' => ['class' => 'col-md-5']
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_consulta' => Yii::$app->request->get('id_consulta')], ['title' => 'Editar']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_consulta' => Yii::$app->request->get('id_consulta')], ['title' => 'Excluir', 'data' => ['confirm' => 'Tem certeza que deseja excluir essa receita médica?']]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
