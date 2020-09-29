<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gerenciar Atestados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atestado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('+ Atestado', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'cid',
                'headerOptions' => ['class' => 'col-md-3 text-center'],
            ],
            
            [
                'attribute' => 'descricao',
                'headerOptions' => ['class' => 'col-md-7 text-center'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['class' => 'col-md-1 text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>


</div>
