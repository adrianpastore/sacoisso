<?php
  require_once('../classes/empresa.php');
  require_once('../DAO/empresaDAO.php');
  $novaEmpresa = new Empresa($_POST['nomeEmpresa'],$_POST['cnpj'],$_POST['enderecoEmpresa']);
  $empresa = new EmpresaDao;
  $empresa->alterar($novaEmpresa);
  require_once('../navegacao/empresa.php');
?>
