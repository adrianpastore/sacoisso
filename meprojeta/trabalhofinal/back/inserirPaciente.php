<?php

include_once('paciente.php');
include_once('pacientedao.php');
include_once('convenio.php');
include_once('conveniodao.php');

$pacientedao = new PacienteDAO();

$pac = new Paciente($_GET['nome'], $_GET['cpf'], $_GET['dtNascimento'], $_GET['endereco']);
$pac->setTelefone($_GET['telefone']);
$pac->setEmail($_GET['email']);
$pac->setRg($_GET['rg']);

$x=1;
while (ISSET($_GET['conv'.$x])) {

    $convenio = new Convenio($_GET['conv'.$x]);
    
    $pac->addConvenio($convenio);
    $x++;
}
if (ISSET($_GET['cpf']) ) {
    $pacientedao->update($pac);   
} else {

    $pacientedao->inserir($pac);   
}

header('Location: /../listaPacientes.php');
?>