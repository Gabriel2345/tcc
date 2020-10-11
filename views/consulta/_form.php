<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;
use app\models\Paciente;
use app\models\Funcionario;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?php echo $form->field($model, 'data')->textInput(['type' => 'date']) ?>

    <?php echo $form->field($model, 'hora')->textInput() ?>

    <?php echo $form->field($model, 'obs')->textArea() ?>

    <?php $pacientes = ArrayHelper::map(Paciente::find()->orderBy('nome')->all(), 'id', 'nome') ?>
    <?php echo $form->field($model, 'id_paciente')->dropDownList($pacientes, ['prompt' => 'Selecione']) ?>

    <?php echo $form->field($model, 'id_funcionario')->textInput() ?>

    

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index', 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
