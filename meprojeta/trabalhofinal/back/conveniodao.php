<?php 

include_once('abstractdao.php');

class ConvenioDAO extends Dao{
    
    public function listar (int $limit, int $offset) {
        $con = $this->getConexao();
        $sql = 'SELECT * FROM convenio LIMIT $1 OFFSET $2';
        $vetor = array($limit, $offset);
    
        $res = pg_query_params($con, $sql, $vetor);
        $listconvenio = array();
        while ($linha = pg_fetch_assoc($res)) {
            $convenio = new Convenio ($linha['codigo']);            
            array_push($listconvenio, $convenio);
        }

        pg_close($con);
        return $listconvenio;
    }

    public function buscar($codigo) {
        $con = $this->getConexao();
        $sql = 'SELECT * FROM convenio WHERE codigo = $1';
        $res = pg_query_params($con, $sql, array($codigo));
        $linha = pg_fetch_assoc($res);

        $convenio = new Convenio ($linha['nome']);
        $convenio->setCodigo($linha['codigo']);

        pg_close($con);
        return $convenio;
    }

    public function inserir($convenio) {
        $con = $this->getConexao();
        $sql = 'INSERT INTO convenio (nome) VALUES ($1)';
        $vetor = array($convenio->getNome());

        $res = pg_query_params($con, $sql, $vetor);
        $linha = pg_fetch_assoc($res);
        $convenio->setCodigo(intval($linha['codigo']));

        pg_close($con);
    }

    public function excluir($codigo) {
        $con = $this->getConexao();
        $sql = 'DELETE FROM convenio WHERE codigo=$1';
        $res = pg_query_params($con, $sql, array($codigo));

        pg_close($con);
    }

    public function alterar($convenio) {
        $con = $this->getConexao();
        $sql = 'UPDATE convenio SET nome = $1 WHERE codigo = $2';
        $vetor = array($convenio->getNome(), $convenio->getCodigo());

        $res = pg_query_params($con, $sql, $vetor);
        pg_close($con);
    }
}

?>