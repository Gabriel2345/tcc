<?php 
/** @var $this yii\web\View
 *  @var $paciente app\models\Paciente
 * 
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">Informações da triagem</div>
    <div class="panel-body">
        <dl>
            <dt>Nome</dt>
            <dd><?php echo $paciente->nome; ?></dd>
            <dt>Temperatura</dt>
            <dd><?php echo $paciente->temp; ?></dd>
            <dt>Pressão arterial sistólica</dt>
            <dd><?php echo $paciente->pas; ?></dd>
            <dt>Pressão arterial diastólica</dt>
            <dd><?php echo $paciente->pad; ?></dd>
            <dt>Saturação</dt>
            <dd><?php echo $paciente->sat; ?></dd>
        </dl>
    
    </div>
</div>