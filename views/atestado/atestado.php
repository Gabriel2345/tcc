<?php
/**
 * @var $this yii\web\view
 * @var $atestado app\models\Atestado
 */
?>



<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center">Atestado</div>
    <div class="panel-body">
        <p style="text-align: justify">Atesto que o(a) Sr.(a) <?php echo $atestado->consulta->paciente->nome; ?> esteve em consulta nesta unidade das ______ às _______.</p>                
        <p><?php echo $atestado->descricao; ?></p>
        <br/>
        <br/>
        <br/>
        <br/>
    
        <p>CID:</p>
        <strong>Data:</strong><?php echo $atestado->data; ?>
        <p style="text-align: center">________________________________________________</p>
        <p style="text-align: center">Assinatura e carimbo do médico</p>
    </div>
</div>


   

                

             
  

        
    

