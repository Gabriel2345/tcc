<?php 
/** @var $this yii\web\view
 *  @var $receita app\models\Receita
 */
?>

<div class="panel panel-default">
        <div class="panel-heading">Dados do paciente</div>
            <div class="panel-body">
                <dl>
                    <dt>Nome</dt>
                    <dd><?php echo $receita->consulta->paciente->nome; ?></dd>
                    <dt>Endereço</dt>
                    <dd><?php echo $receita->consulta->paciente->endereco; ?></dd>
                    <dt>Telefone</dt>
                    <dd><?php echo $receita->consulta->paciente->telefone; ?></dd>
                    
                </dl>    
            </div>
</div>

<h1 style="text-align: center">Receita médica</h1>

<p>Data:</p><?php echo $receita->data; ?>
<p><?php echo $receita->descricao; ?></p>