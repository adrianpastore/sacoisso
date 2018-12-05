<?php
  require_once('../classes/empresa.php');
  require_once('../DAO/empresaDAO.php');
  $novaEmpresa = new Empresa($_GET['nomeEmpresa'],$_GET['cnpj'],$_GET['enderecoEmpresa']);
  $empresa = new EmpresaDao;

  /*if (ISSET($_GET['cnpj']) ) {
    $empresa->alterar($novaEmpresa);  
  } else {
    $empresa->add($novaEmpresa);
  }*/
  $empresa->add($novaEmpresa);   
  require_once('../navegacao/empresa.php');
?>
