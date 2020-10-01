<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Triagem';
$this->params['breadcrumbs'][] = $this->title;
Icon::map($this);
?>
<div class="triagem-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Icon::show('arrow-left') . ' Voltar', ['/fila-espera/index'], ['class' => 'btn btn-danger']) ?>
        <?php echo Html::a(Icon::show('plus') . ' Triagem', ['create', 'id_paciente' => Yii::$app->request->get('id_paciente')], ['class' => 'btn btn-primary']) ?>
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
                'attribute' => 'id_prioridade',
                'value' => 'prioridade.descricao',
                'headerOptions' => ['class' => 'col-md-1 text-center']
            ],

            [
                'attribute' => 'obs',
                'headerOptions' => ['class' => 'col-md-4 text-center'],
            ],            

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Ações',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model) {
                        return Html::a(Icon::show('trash'), ['delete', 'id' => $model->id, 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Excluir', 'data' => ['confirm' => 'Tem certeza que deseja excluir esse atendimento?']] );
                    },
                    'update' => function($url, $model) {
                        return Html::a(Icon::show('edit'), ['update', 'id' => $model->id, 'id_paciente' => Yii::$app->request->get('id_paciente')], ['title' => 'Editar']);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
