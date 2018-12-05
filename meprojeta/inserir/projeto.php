<?php
  require_once('../classes/projeto.php');
  require_once('../DAO/projetoDAO.php');
  require_once('../classes/empresa.php');
  require_once('../DAO/empresaDAO.php');

  $newEmp = new EmpresaDao();
  $emp = $newEmp->busca($_POST['empresa']);
  $novoProjeto = new Projeto($_POST['nomeProjeto'],$_POST['descricao']);
  $novoProjeto->setEmpresa($emp);
  $newProj = new projetoDao();
  $newProj->add($novoProjeto);




require_once('../navegacao/projetos.php');
?>
