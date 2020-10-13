<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receita */

$this->title = 'Alterar Receita';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Receitas', 'url' => ['index', 'id_consulta' => Yii::$app->request->get('id_consulta'), 'id_fila' => Yii::$app->request->get('id_fila'), 'id_paciente' => Yii::$app->request->get('id_paciente')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
