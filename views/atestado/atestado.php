<?php
/**
 * @var $this yii\web\view
 * @var $atestado app\models\Atestado
 */
?>



<div class="container" style="width: 50%">
<h3 style="text-align: center">Atestado</h3>
    <table border="0">
                
            <tr>
                <td style="text-align: center">
                        Atesto que o(a) Sr.(a) <?php echo $atestado->consulta->paciente->nome; ?>
                        foi atendido das ________ às ________ nesta Unidade de saúde.
                </td>
             </tr>
             <tr>
                <td>
                Foi orientado a voltar ao trabalho

                Foi orientado a permanecer em repouso hoje

                Deverá permanecer em repouso _____ dia(s) a partir desta data

                CID:

                <strong>Data:</strong><?php echo $atestado->data; ?>

                ________________________________________________
                Assinatura do médico
                </td>

             </tr>
    </table>
</div>
        
    

