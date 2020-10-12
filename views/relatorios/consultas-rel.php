<?php
/** @var $this yii\web\view */
/** @var $consultas app\models\Consulta */
?>

<h1>Lista de consultas</h1>

<table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
    <tr>
        <th style="width: 60%; border-bottom: 1px solid #000; line-height: 30px; text-align: left;">Paciente</th>
        <th style="width: 20%; border-bottom: 1px solid #000; line-height: 30px; text-align: center;">Horário</th>
        <th style="width: 20%; border-bottom: 1px solid #000; line-height: 30px; text-align: center;">Motivo da consulta</th>
    </tr>

    <?php foreach($consultas as $k => $consulta): ?>
        <tr style="background-color: <?php echo $k % 2 == 0 ? '#e4e4e4' : '#ffffff'; ?>;">
            <td><?php echo $consulta->paciente->nome; ?></td>
            <td style="text-align: center; line-height: 25px;"><?php echo $consulta->hora; ?></td>
            <td style="text-align: center; line-height: 25px;"><?php echo $consulta->obs; ?></td>
        </tr>
    <?php endforeach; ?>
</table>