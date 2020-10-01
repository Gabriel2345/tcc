<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\FilaEspera */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fila-espera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prioridade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_triagem')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
