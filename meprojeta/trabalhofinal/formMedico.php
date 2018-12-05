<?php require('base/header.php');?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="listaConsulta.php">Consultas</a></li>
                <li class="active"><a href="listaMedicos.php">Médicos<span class="sr-only">(current)</span></a></li>
                <li><a href="listaPacientes.php">Pacientes</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
        include_once('back/medico.php');
        include_once('back/medicodao.php');

        $m = ISSET($_GET['crm']);
        if ($m) {
            $mdao = new MedicoDao();
            $m = $mdao->buscar($_GET['crm']);
        }
    ?>

<h2>Cadastro de médico</h2>

<form action="back/inserirMedico.php" method="GET">

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Nome: </span>
        <input type="text" class="form-control" placeholder="ex: José Silva dos Santos" aria-describedby="basic-addon1"
            name="nome" value="<?php if($m) echo $m->getNome()?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">CPF: </span>
        <input type="text" class="form-control" placeholder="ex: XXXXXXXXXXX" aria-describedby="basic-addon1" name="cpf"
            value="<?php if($m) echo $m->getCpf()?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">CRM: </span>
        <input type="text" class="form-control" placeholder="ex: 000000/RS" aria-describedby="basic-addon1" name="crm"
            value="<?php if($m) echo $m->getCrm()?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Salário: </span>
        <input type="number" class="form-control" placeholder="ex: 2000.00" aria-describedby="basic-addon1" name="salario"
            value="<?php if($m) echo $m->getSalario()?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Telefone: </span>
        <input type="number" class="form-control" placeholder="ex: (xx)XXXXXXXXX" aria-describedby="basic-addon1" name="telefone"
            value="<?php if($m) echo $m->getTelefone()?>">
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">E-mail: </span>
        <input type="email" class="form-control" placeholder="ex: nome@gmail.com" aria-describedby="basic-addon1" name="email"
            value="<?php if($m) echo $m->getEmail()?>">
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Data de Nascimento: </span>
        <input type="date" class="form-control" aria-describedby="basic-addon1" name="dtNascimento" value="<?php if($m) echo $m->getDataNascimento()?>"
            required>
    </div>

    <div class="botao">
        <div class="btn-group btn-group-lg">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>

</form>

<?php require('base/footer.php');?>