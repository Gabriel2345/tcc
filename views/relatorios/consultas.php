<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model app\models\FiltroConsultaForm */
/* @var $form ActiveForm */

$this->title = "Relatório de consultas por data";
$this->params['breadcrumbs'][] = 'Relatórios';
$this->params['breadcrumbs'][] = $this->title;


Icon::map($this);
?>
<div class="relatorios-consultas">


    <h1><?php echo $this->title; ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'data')->textInput(['type' => 'date']) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Icon::show('check') . ' Processar', ['class' => 'btn btn-success']) ?>
            <?= Html::a(Icon::show('times') . ' Cancelar', ['/site/index'], ['class' => 'btn btn-danger']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- relatorios-consultas -->
