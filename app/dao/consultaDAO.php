<?php

class ConsultaDAO {




    public function create(Consulta $consulta) {
        try {
            $sql = "INSERT INTO consultas (id_paciente, id_medico, data_consulta, hora_consulta, status, observacoes)
                    VALUES (:id_paciente, :id_medico, :data_consulta, :hora_consulta, :status, :observacoes)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_paciente", $consulta->getId_paciente());
            $p_sql->bindValue(":id_medico", $consulta->getId_medico());
            $p_sql->bindValue(":data_consulta", $consulta->getData_consulta());
            $p_sql->bindValue(":hora_consulta", $consulta->getHora_consulta());
            $p_sql->bindValue(":status", $consulta->getStatus());
            $p_sql->bindValue(":observacoes", $consulta->getObservacoes());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir consulta <br>" . $e . '<br>';
        }
    }

    // Implemente os métodos read, update e delete conforme necessário
    public function read($where = '') {
        try {
            $sql = "SELECT * FROM consultas";
            
            // Adiciona a cláusula WHERE se uma condição foi fornecida
            if (!empty($where)) {
                $sql .= " WHERE " . $where;
            }
            
            $sql .= " ORDER BY id_consulta ASC";
            
            
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaConsulta($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    
     
    public function update(Consulta $consulta) {
        try {
            $sql = "UPDATE consultas SET id_paciente = :id_paciente, 
                                        id_medico = :id_medico, 
                                        data_consulta = :data_consulta, 
                                        hora_consulta = :hora_consulta, 
                                        status = :status, 
                                        observacoes = :observacoes 
                                        WHERE id_consulta = :id_consulta";
    
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_paciente", $consulta->getId_paciente());
            $p_sql->bindValue(":id_medico", $consulta->getId_medico());
            $p_sql->bindValue(":data_consulta", $consulta->getData_consulta());
            $p_sql->bindValue(":hora_consulta", $consulta->getHora_consulta());
            $p_sql->bindValue(":status", $consulta->getStatus());
            $p_sql->bindValue(":observacoes", $consulta->getObservacoes());
            $p_sql->bindValue(":id_consulta", $consulta->getId_consulta());

    
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
    
    

    public function delete(consulta $consulta) {
        try {
            $sql = "DELETE FROM consultas WHERE id_consulta = :id_consulta";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_consulta", $consulta->getId_consulta());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }




    private function listaConsulta($row) {
        // Criar uma instância da classe Consulta
        $consulta = new Consulta();
        $consulta->setId_consulta($row['id_consulta']);
        $consulta->setId_paciente($row['id_paciente']);
        $consulta->setId_medico($row['id_medico']);
        $consulta->setData_consulta($row['data_consulta']);
        $consulta->setHora_consulta($row['hora_consulta']);
        $consulta->setStatus($row['status']);
        $consulta->setObservacoes($row['observacoes']);

        
        return $consulta;
    }
    
        
    
    
}
?>
