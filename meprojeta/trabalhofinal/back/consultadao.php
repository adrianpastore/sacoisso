<?php
require_once('abstractdao.php');
require_once('medico.php');
require_once('paciente.php');
require_once('convenio.php');
Class ConsultaDao extends Dao{
    
    public function inserir($consulta){
        $conn = $this->getConexao();
        $sql = "INSERT INTO consulta (data_hora,crmmedico,cpfpaciente,codconvenio) VALUES ($1)";
        $vetor = array($consulta->getDataHora(), $consulta->medico()->getCrm(), $consulta->paciente()>getCpf(), $consulta->convenio()->getCodigo());
        $res = pg_query_params($conn, $sql,$vetor);
        
        pg_close($conn);
    }
    
    public function excluir($codigo){
        $conn = $this->getConexao();
        $sql = "DELETE FROM consulta WHERE codigo = $1";
        $res = pg_query_params($conn,$sql,array($codigo));
        
        pg_close($conn);
    }
    
    public function buscar($codigo){
        $conn = $this->getConexao();
        $sql = "SELECT * FROM consulta WHERE codigo = $1";
        $vetor = array($codigo);
        $res = pg_query_params($conn, $sql, $vetor);
        $linha = pg_fetch_assoc($res);
        $consulta = new Consulta($linha['data_hora'], $linha['crmmedico'],$linha['cpfpaciente'], $linha['codconvenio']);
        $consulta->setCodigo($linha['codigo']);
        
        pg_close($conn);
        return $consulta;
    }
    
    public function listar(int $limit, int $offset){
        $conn = $this->getConexao();
        $sql = "SELECT c.data_hora, c.codigo, c.crmmedico, m.nome as nomemedico, m.cpf as cpfmedico, m.salario as salario, m.telefone as telefonemedico, m.email as emailmedico, m.datanascimento as dtmedico, c.cpfpaciente as cpfpaciente, p.nome as nomepaciente, p.datanascimento as dtpaciente, p.endereco as enderecopaciente, c.codconvenio FROM consulta c INNER JOIN medico m ON c.crmmedico = m.crm INNER JOIN paciente p ON c.cpfpaciente = p.cpf ORDER BY c.data_hora LIMIT $1 OFFSET $2";
        $vetor = array($limit,$offset);
        $res = pg_query_params($conn,$sql,$vetor);
        $listaconsultas = array();
        
        while($linha = pg_fetch_assoc($res)){
            $consulta = new Consulta(new DateTime($linha['data_hora']));

            $medico = new Medico($linha['nomemedico'], $linha['cpfmedico'], $linha['crmmedico'], $linha['salario'], $linha['telefonemedico'], $linha['emailmedico'], $linha['dtmedico']);

            $paciente = new Paciente($linha['nomepaciente'], $linha['cpfpaciente'], $linha['dtpaciente'], $linha['enderecopaciente']);

            if (ISSET($linha['codconvenio']) ) {
                $convenio = new Convenio($linha['codconvenio']);
                $consulta->setConvenio($convenio);
            }

            $consulta->setMed($medico);
            $consulta->setPac($paciente);
            $consulta->setCodigo($linha['codigo']);

            array_push($listaconsultas,$consulta);
        }
        
        pg_close($conn);
        return $listaconsultas;
    }

    public function alterar($consulta){
		$conn = $this->getConexao();
        $sql = "UPDATE consulta SET data_hora=$1, crmmedico=$2, cpfpaciente=$3 WHERE codigo=$4";
        $vetor = array($consulta->getDataHora(), $consulta->medico()->getCrm(), $consulta->paciente()->getCpf());
		$res = pg_query_params($conn,$sql,$vetor);
        
        pg_close($conn);
	}
}
?>