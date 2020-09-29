<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Prioridade */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="prioridade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?php echo $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cor')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'previsao_tempo')->textInput() ?>

    <?php echo $form->field($model, 'prioridade')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo html::a(Icon::show('times') . ' Cancelar', ['index'],['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
