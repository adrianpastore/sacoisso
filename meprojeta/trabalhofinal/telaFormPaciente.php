<?php require('base/header.php')?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="listaConsulta.php">Consultas</a></li>
                <li><a href="listaMedicos.php">Médicos</a></li>
                <li><a href="listaPacientes.php">Pacientes</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
        include_once('back/paciente.php');
        include_once('back/pacientedao.php');
        include_once('back/convenio.php');
        include_once('back/conveniodao.php');

        $p = ISSET($_GET['cpf']);
        if ($p) {
            $pdao = new PacienteDAO();
            $p = $pdao->buscar($_GET['cpf']);
        }
        $cdao = new ConvenioDAO();
        $listConv = $cdao->listar(50,0);
    ?>

<h2>Cadastro de paciente</h2>

<form action="back/inserirPaciente.php" method="GET">

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Nome: </span>
        <input type="text" class="form-control" placeholder="ex: José Silva dos Santos" aria-describedby="basic-addon1"
            name="nome" value="<?php if($p) echo $p->getNome();?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">CPF: </span>
        <input type="text" class="form-control" placeholder="ex: XXXXXXXXXXX" aria-describedby="basic-addon1" name="cpf"
            value="<?php if($p) echo $p->getCpf();?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">RG: </span>
        <input type="text" class="form-control" placeholder="ex: xxxxxxxxxx" aria-describedby="basic-addon1" name="rg"
            value="<?php if($p) echo $p->getRg();?>" required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Telefone: </span>
        <input type="number" class="form-control" placeholder="ex: (xx)XXXXXXXXX" aria-describedby="basic-addon1" name="telefone"
            value="<?php if($p) echo $p->getTelefone();?>">
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">E-mail: </span>
        <input type="email" class="form-control" placeholder="ex: nome@gmail.com" aria-describedby="basic-addon1" name="email"
            value="<?php if($p) echo $p->getEmail();?>">
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Data de Nascimento: </span>
        <input type="date" class="form-control" aria-describedby="basic-addon1" name="dtNascimento" value="<?php if($p) echo $p->getDtNascimento();?>"
            required>
    </div>

    <div class="input-group input-group-lg" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Endereço: </span>
        <input type="text" class="form-control" placeholder="ex: Rua Duque de Caxias, 223" aria-describedby="basic-addon1"
            name="endereco" value="<?php if($p) echo $p->getEndereco();?>" required>
    </div>

    <div class="input-group input-group-lg grupoconv" id="inputs">
        <span class="input-group-addon" id="basic-addon1">Convênio: </span>
        <select name="conv1" id="input" class="form-control conv">
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
    </div>

    <div class="botao">
        <div class="btn-group btn-group-lg">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>

</form>
<script src="back/add.js"></script>
<?php require('base/footer.php')?>