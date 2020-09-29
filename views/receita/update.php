<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */

$this->title = 'Update Receita: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Receitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id, 'Consulta_Id' => $model->Consulta_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
