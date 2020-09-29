<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Triagem */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="triagem-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo $form->field($model, 'temp')->textInput() ?>

    <?php echo $form->field($model, 'sat')->textInput() ?>

    <?php echo $form->field($model, 'pad')->textInput() ?>

    <?php echo $form->field($model, 'pas')->textInput() ?>

    <?php echo $form->field($model, 'obs')->textArea() ?>

    <?php echo $form->field($model, 'id_prioridade')->textInput() ?>

    <?php echo $form->field($model, 'id_funcionario')->hiddenInput()->label(false) ?>



    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index', 'id_paciente' => Yii::$app->request->get('id_paciente')], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
