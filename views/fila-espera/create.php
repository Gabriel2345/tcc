<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FilaEspera */

$this->title = 'Incuir paciente';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar fila de espera', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fila-espera-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
