<?php
/** @var $this yii\web\view */
/** @var $consultas app\models\Consulta */
?>

<h1>Lista de consultas</h1>

<table border="1" cellspacing="0" cellpadding="0" style="width: 100%">
    <tr>
        <th style="width: 60%">Paciente</th>
        <th style="width: 20%">Horário</th>
        <th style="width: 20%">Motivo da consulta</th>
    </tr>

    <?php foreach($consultas as $k => $consulta): ?>
        <tr>
            <td><?php echo $consulta->paciente->nome; ?></td>
            <td><?php echo $consulta->hora; ?></td>
            <td><?php echo $consulta->obs; ?></td>
        </tr>
    <?php endforeach; ?>
</table>