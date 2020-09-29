<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prioridade */

$this->title = 'Alterar Prioridade';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Prioridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prioridade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
