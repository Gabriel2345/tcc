<?php
/**
 * @var $this yii\web\view
 * @var $atestado app\models\Atestado
 */
?>




<h3 style="text-align: center">Atestado</h3>
   
<p style="text-align: justify">Atesto que o(a) Sr.(a) <?php echo $atestado->consulta->paciente->nome; ?> esteve em consulta nesta unidade das ______ às _______.</p>                
        
              
                        
                            

                            
                        
                <p>Foi orientado a voltar ao trabalho.</p>

                

                <p>Foi orientado a permanecer em repouso hoje.</p>

                

                <p>Deverá permanecer em repouso _____ dia(s) a partir desta data.</p>

                <p>CID:</p>

                <strong>Data:</strong><?php echo $atestado->data; ?>

                <p style="text-align: center">________________________________________________</p>
                <p style="text-align: center">Assinatura e carimbo do médico</p>
                

             
  

        
    

