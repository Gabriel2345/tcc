<?php
/**
 * @var $this yii\web\view
 * @var $atestado app\models\Atestado
 */
?>


<body>
    <h3 style="text-align: center">ATESTADO</h3>
    <br>
    <p style="text-align: justify">Atesto que o(a) Sr.(a) <?php echo $atestado->consulta->paciente->nome; ?> esteve em consulta nesta unidade das ______ às _______.</p>
    <br>
    <br>
    <input type="radio" name="item" id="item1" value="1" >
    <label for="item1"> Foi orientado a voltar ao trabalho</label>
    <br>
    <br>
    <input type="radio" name="item" id="item1" value="1" >
    <label for="item1"> Foi orientado a permanecer em repouso hoje</label>
    <br>
    <br>
    <input type="radio" name="item" id="item1" value="1" >
    <label for="item1"> Deverá permanecer em repouso _____ dia(s) a partir desta data</label>
    <br>
    <br>
    <br>
    <p>CID:</p>
    <br>
    <p>Data: <?php echo $atestado->data; ?></p>
    <br>
    <p style="text-align: center">________________________________________</p>
    <p style="text-align: center">Assinatura e carimbo do médico</p>


</body>


   

                

             
  

        
    

