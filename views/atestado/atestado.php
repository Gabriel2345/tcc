<?php
/**
 * @var $this yii\web\view
 * @var $atestado app\models\Atestado
 */
?>

<h1 style="text-align: center">Atestado</h1>



<p>Atesto que o(a) Sr.(a) <?php echo $atestado->consulta->paciente->nome; ?> foi atendido nesta Unidade de saúde </p></br>
<p>das ________ às ________</p>
</br>
</br>
</br>
<input type="checkbox"/>Foi orientado a voltar ao trabalho </br>
<input type="checkbox"/>Foi orientado a permanecer em repouso hoje </br>
<input type="checkbox"/>Deverá permanecer em repouso _____ dia(s) a partir desta data </br>
</br>
</br>
</br>
<p>CID:</p>
</br>
</br>
<p><strong>Data:</strong><?php echo $atestado->data; ?></p>
</br>
</br>
<p style="text-align: center">________________________________________________</p>
<p style="text-align: center">Assinatura do médico</p>
