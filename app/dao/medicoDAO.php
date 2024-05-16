<?php
/*
    Criação da classe paciente com o CRUD
*/
class medicoDAO{

    
    public function buscarPorId($id) {
        try {
            $sql = "SELECT * FROM medicos WHERE id_medico = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $medico = $p_sql->fetch(PDO::FETCH_ASSOC);
            
            if ($medico) {
                // Se o medico foi encontrado, criar um objeto medico e retorná-lo
                $medicoObj = new medico();
                $medicoObj->setId_medico($medico['id_medico']);
                $medicoObj->setNome($medico['nome']);
                // Definir outras propriedades do medico conforme necessário
                
                return $medicoObj;
            } else {
                // Se o medico não foi encontrado, retornar null ou uma mensagem de erro
                return null;
            }
        } catch (Exception $e) {
            // Lidar com exceções, se necessário
            echo "Erro ao buscar medico: " . $e->getMessage();
            return null;
        }
    }

        
    
    public function create(medico $medico) {
        

        try {
            $sql = "INSERT INTO medicos (                   
                  nome,especialidade,email,telefone)
                  VALUES (
                  :nome,:especialidade,:email,:telefone)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $medico->getNome());
            $p_sql->bindValue(":especialidade", $medico->getEspecialidade());
            $p_sql->bindValue(":email", $medico->getEmail());
            $p_sql->bindValue(":telefone", $medico->getTelefone());

            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir medico <br>" . $e . '<br>';
        }
    }

    public function read($where = '') {
        try {
            $sql = "SELECT * FROM medicos";
            
            // Adiciona a cláusula WHERE se uma condição foi fornecida
            if (!empty($where)) {
                $sql .= " WHERE " . $where;
            }
            
            $sql .= " ORDER BY id_medico ASC";
    
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaMedico($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    
     
    public function update(medico $medico) {
        try {
            $sql = "UPDATE medico SET
                nome = :nome,
                especialidade = :especialidade,
                email = :email,
                telefone = :telefone,
                WHERE id_medico = :id_medico";
    
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $medico->getNome());
            $p_sql->bindValue(":especialidade", $medico->getEspecialidade());
            $p_sql->bindValue(":email", $medico->getEmail());
            $p_sql->bindValue(":telefone", $medico->getTelefone());
            $p_sql->bindValue(":id_medico", $medico->getId());
    
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
    

    public function delete(medico $medico) {
        try {
            $sql = "DELETE FROM medico WHERE id_medico = :id_medico";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_medico", $medico->getId_medico());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }

    private function listaMedico($row) {
        $medico = new medico();
        $medico->setId_medico($row['id_medico']);
        $medico->setNome($row['nome']);
        $medico->setEspecialidade($row['especialidade']);
        $medico->setEmail($row['email']);
        $medico->setTelefone($row['telefone']);
        
        return $medico;
    }
 }

 ?>
