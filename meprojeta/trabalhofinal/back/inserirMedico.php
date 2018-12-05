<?php

include_once('medico.php');
    include_once('medicodao.php');

    $medicodao = new MedicoDao();

    $med = new Medico($_GET['nome'], $_GET['cpf'], $_GET['crm'], intval($_GET['salario']), $_GET['telefone'], $_GET['email'], $_GET['dtNascimento']);
       
    $medicodao->inserir($med);   


    header('Location: /../listaMedicos.php');
?>