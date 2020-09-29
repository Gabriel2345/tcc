<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Alterar Status';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
