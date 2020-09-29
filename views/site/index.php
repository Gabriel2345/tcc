<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sistema de atendimento de urgência e emergência';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Sistema de atendimento de urgência e emergência</h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Cargos</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12"><p><?php echo html::a('Gerenciar Cargos', ['/cargo/index'], ['class' => 'btn btn-primary btn-block']); ?></p></div>
                        </div>
                    </div>
                </div>                
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Funcionários</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12"><p><?php echo html::a('Gerenciar Funcionários', ['/funcionario/index'], ['class' => 'btn btn-primary btn-block']); ?></p></div>
                        </div>
                    </div>
                </div>                
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12"><p><?php echo html::a('Gerenciar Pacientes', ['/paciente/index'], ['class' => 'btn btn-primary btn-block']); ?></p></div>
                        </div>
                    </div>
                </div>                
        </div>

    </div>
</div>
