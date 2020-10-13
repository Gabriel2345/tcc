<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Atestado */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="atestado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?php echo $form->field($model, 'data')->textInput(['type' => 'date']) ?>

    <?php echo $form->field($model, 'descricao')->textArea() ?>

    <?php echo $form->field($model, 'id_consulta')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>        
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index', 'id_consulta' => $model->id_consulta, 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
