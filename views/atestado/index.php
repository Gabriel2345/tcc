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
        <?php echo Html::a(Icon::show('arrow-left') . ' Voltar', ['consulta/index', 'id_paciente' => Yii::$app->request->get('id_paciente')], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Icon::show('plus') . ' Atestado', ['create', 'id_consulta' => Yii::$app->request->get('id_consulta')], ['class' => 'btn btn-primary']) ?>
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
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],

            [
                'attribute' => 'id_consulta',
            ],            
            
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
