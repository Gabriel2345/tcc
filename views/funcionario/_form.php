<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use app\models\Cargo;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */
/* @var $form yii\widgets\ActiveForm */
Icon::map($this);
?>

<div class="funcionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?php $cargos = ArrayHelper::map(Cargo::find()->orderBy('nome')->all(), 'id', 'nome'); ?>
    <?php echo $form->field($model, 'id_cargo')->dropDownList($cargos, ['prompt' => '=== Selecione o cargo ===']); ?>

    <?php echo $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'telefone')->textInput(['maxlength' => true])->widget(MaskedInput::className(), [
        'mask' => '(99) 99999-9999'
    ]) ?>

    <?php echo $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?php if($model->isNewRecord) : ?>
        <?php echo $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>
    <?php else: ?>
        <?php echo $form->field($model, 'usuario')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?> 
    <?php endif; ?>
        
    <?php echo $form->field($model, 'senha')->passwordInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?php echo Html::submitButton(Icon::show('check') . ' Salvar', ['class' => 'btn btn-success']) ?>
        <?php echo Html::a(Icon::show('times') . ' Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
