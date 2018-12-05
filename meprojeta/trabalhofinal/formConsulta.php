<?php require('base/header.php')?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="listaConsulta.php">Consultas<span class="sr-only">(current)</span></a></li>
                <li><a href="listaMedicos.php">Médicos</a></li>
                <li><a href="listaPacientes.php">Pacientes</a></li>
            </ul>
        </div>
    </div>
</nav>
<h2>Agendamento de consulta</h2>

<form action="back/inserirConsulta.php">
    <div class="etapa1">
        <input type="hidden" name="codigo" value="">

        <div class="input-group input-group-lg" id="inputs">
            <span class="input-group-addon" id="basic-addon1">Dia da consulta: </span>
            <input type="date" class="form-control" aria-describedby="basic-addon1" name="dtConsulta" value="" required>
        </div>

        <div class="input-group input-group-lg" id="inputs">
            <span class="input-group-addon" id="basic-addon1">Hora da consulta: </span>
            <input type="time" class="form-control" aria-describedby="basic-addon1" name="dtConsulta" value="" required>
        </div>

        <div class="input-group input-group-lg" id="inputs">
            <span class="input-group-addon" id="basic-addon1">CPF : </span>
            <select name="cpfCliente" id="input" class="form-control" required>
                <option value=""></option>
                <option value="cpf1">Nome 1 (cpf1)</option>
                <option value="cpf2">Nome 2 (cpf2)</option>
                <option value="cpf3">Nome 3 (cpf3)</option>
            </select>
        </div>

    </div>

    <div class="etapa2" type="hidden">

        <div class="input-group input-group-lg" id="inputs">
            <span class="input-group-addon" id="basic-addon1">Nome do médico: </span>
            <select name="crmMedico" id="input" class="form-control" required>
                <option value=""></option>
                <option value="crm1">Nome 1 (crm1)</option>
                <option value="crm2">Nome 2 (crm2)</option>
                <option value="crm3">Nome 3 (crm3)</option>
            </select>
        </div>

        <div class="input-group input-group-lg grupoconv" id="inputs">
            <span class="input-group-addon" id="basic-addon1">Convênio: </span>
            <select name="convenio" id="input" class="form-control conv">
                <option value=""></option>
                <?php 
                include_once('back/convenio.php');
                include_once('back/conveniodao.php');

                $conveniodao = new ConvenioDAO();
                $convenio = $conveniodao->listar(20,0);

                foreach ($convenio as $c) {?>
                <option value=<?php echo $c->getCodigo()?>>
                    <?php echo $c->getNome()?> ( Código:
                    <?php echo $c->getCodigo()?>)
                </option>
                <?php }?>
            </select>

            <div class="botao">
                <div class="btn-group btn-group-lg">
                    <button type="submit" class="btn btn-primary">Marcar consulta</button>
                </div>
            </div>

        </div>

        <?php require('base/footer.php'); ?>