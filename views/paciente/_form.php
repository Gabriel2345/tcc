<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'data_nascimento')->textInput(['type' => 'date']) ?>

    <?php echo $form->field($model, 'nome_mae')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
