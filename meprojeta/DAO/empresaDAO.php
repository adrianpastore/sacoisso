<?php
require_once('../classes/empresa.php');
require_once('../DAO/absdao.php');

class EmpresaDao extends dao{
  public function lista() {
  $conn = $this->criaConexao();
        $res = pg_query($conn, 'SELECT * FROM empresa');
        $empresas = array();
        while($empresa = pg_fetch_assoc($res)){
            array_push($empresas,$empresa);
        }
        pg_close($conn);
        return $empresas;
    }
  public function add($empresa){
      $conn = $this->criaConexao();
      $sql = 'INSERT INTO empresa (nome, "CNPJ", endereço) VALUES ($1, $2, $3)';
      $vetor = array($empresa->getNome(), $empresa->getcnpj(),  $empresa->getEndereco());
      pg_query_params($conn,$sql,$vetor);
      pg_close($conn);
  }
    public function deletar($id) {
        $conn = $this->criaConexao();
        $sql2 = 'DELETE FROM empresa WHERE "idEmpresa" = $1';
        pg_query_params($conn, $sql2, array($id));
        pg_close($conn);
    }
    public function buscanome($cnpj) {
       $conn = $this->criaConexao();
       $sql3 = 'SELECT nome FROM empresa WHERE "CNPJ" = $1';
       $vetor2 = array($cnpj);
       $res = pg_query_params($conn,$sql3,$vetor2);
       while($empresa1 = pg_fetch_assoc($res)){
           $empresa = $empresa1;
       }
       pg_close($conn);
       return $empresa;
   }
    public function buscacnpj($cnpj) {
        $conn = $this->criaConexao();
        $sql3 = 'SELECT "CNPJ" FROM empresa WHERE "CNPJ" = $1';
        $vetor2 = array($cnpj);
        $res = pg_query_params($conn,$sql3,$vetor2);
        while($empresa1 = pg_fetch_assoc($res)){
            $empresa = $empresa1;
        }
        pg_close($conn);
        return $empresa;
    }
    public function busca($cnpj) {
        $conn = $this->criaConexao();
        $sql3 = 'SELECT * FROM empresa WHERE "CNPJ" = $1';
        $vetor2 = array($cnpj);
        $res = pg_query_params($conn,$sql3,$vetor2);
        $buscaEmpresa = array();
        while($empresa = pg_fetch_assoc($res)){
            array_push($buscaEmpresa,$empresa);
        }
        pg_close($conn);
        return $buscaEmpresa;
    }
    public function alterar($empresa) {
            $conn = $this->criaConexao();
            $sql = 'UPDATE empresa SET nome = $1, "CNPJ" = $2, endereço = $3
            WHERE "idEmpresa" = $4';
            $vetor = array($empresa->getNome(), $empresa->getcnpj(),  $empresa->getEndereco(), $empresa->getIdEmpresa());
            pg_query_params($conn, $sql, $vetor); 
            pg_close($conn);
        }
}
/*$empdao = new EmpresaDao;
//$empresa = new Empresa('progra(Maria)', '94563441',  'Avenida das Marias, 261');
//$empdao->add($empresa);

//$empdao->lista();
//$emp1 = new Empresa('aaaab', '98745869', 'ddwi bloc 5b');
$empdao->alterar('turururu', "123445687", "avenida dos turururu", 2);
var_dump($empdao->lista());

*/
?>
