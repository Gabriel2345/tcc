<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = 'Update Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Consultas', 'url' => ['index', 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
