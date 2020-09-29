<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atestado */

$this->title = 'Novo Atestado';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Atestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atestado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
