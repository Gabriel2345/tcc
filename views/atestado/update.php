<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atestado */

$this->title = 'Alterar Atestado';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar Atestados', 'url' => ['index', 'id_consulta' => Yii::$app->request->get('id_consulta')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atestado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
