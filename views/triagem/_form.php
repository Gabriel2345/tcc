<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Prioridade;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Triagem */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="triagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id_paciente')->hiddenInput() ?>
    <?php echo $model->paciente->nome; ?>

    <?php echo $form->field($model, 'data')->textInput(['type' => 'date']) ?>

    <?php echo $form->field($model, 'hora')->textInput() ?>
    
    <?php echo $form->field($model, 'temp')->textInput(['type' => 'number', 'min' => '35', 'max' => '42', 'step' => '0.1']) ?>

    <?php echo $form->field($model, 'pas')->textInput() ?>

    <?php echo $form->field($model, 'pad')->textInput() ?>

    <?php echo $form->field($model, 'sat')->textInput(['type' => 'number', 'min' => '70', 'max' => '100']) ?>

    <?php echo $form->field($model, 'obs')->textArea() ?>

    <?php $prioridades = ArrayHelper::map(Prioridade::find()->orderBy('id')->all(), 'id', 'descricao'); ?>
    <?php echo $form->field($model, 'id_prioridade')->dropDownList($prioridades) ?>

    <?php echo $form->field($model, 'id_funcionario')->hiddenInput()->label(false) ?>


    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index', 'id_paciente' => Yii::$app->request->get('id_paciente'), 'id_fila' => Yii::$app->request->get('id_fila')], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
