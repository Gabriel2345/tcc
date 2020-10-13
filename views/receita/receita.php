<?php 
/** @var $this yii\web\view
 *  @var $receita app\models\Receita
 */
?>

<h3 style="text-align: center">RECEITA MÉDICA</h3>
<div class="panel panel-default">
    <div class="panel-heading">Dados do paciente</div>
        <div class="panel-body">
            <dl>
                <dt>Nome: <?php echo $receita->consulta->paciente->nome; ?></dt>
                <br>
                <dt>Endereço: <?php echo $receita->consulta->paciente->endereco; ?></dt>
                <br>
                <dt>Telefone: <?php echo $receita->consulta->paciente->telefone; ?></dt>                         
            </dl>    
        </div>
</div>
<br>
<br>
<p><?php echo $receita->descricao; ?></p>
<br>
<p>Data:<?php echo $receita->data; ?></p>   
<br>
<p style="text-align: center">___________________________________</p>
<p style="text-align: center">Assinatura e carimbo do médico</p>

