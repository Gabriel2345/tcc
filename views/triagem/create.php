<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Triagem */

$this->title = 'Nova Triagem';
$this->params['breadcrumbs'][] = ['label' => 'Gerenciar triagems', 'url' => ['index', 'id_paciente' => Yii::$app->request->get('id_paciente')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="triagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
