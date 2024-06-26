<?php


/*
    Criação da classe paciente com o CRUD
*/
class pacienteDAO{

// Fazer buscar de paciente
    public function buscarPorNome($nome) {
        try {
            $sql = "SELECT * FROM pacientes WHERE nome LIKE :nome";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", '%' . $nome . '%');
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_ASSOC);

            $pacientes = [];
            foreach ($result as $row) {
                $paciente = new paciente();
                $paciente->setId_paciente($row['id_paciente']);
                $paciente->setNome($row['nome']);
                $paciente->setEndereco($row['endereco']);
                $paciente->setEmail($row['email']);
                $paciente->setTelefone($row['telefone']);
                $paciente->setData_nasc($row['data_nasc']);
                $pacientes[] = $paciente;
            }

            return $paciente;
        } catch (Exception $e) {
            echo "Erro ao buscar pacientes: " . $e->getMessage();
            return null;
        }
    }

    public function buscarPorId($id) {
        try {
            $sql = "SELECT * FROM pacientes WHERE id_paciente = :id_paciente";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_paciente", $id);
            $p_sql->execute();
            $paciente = $p_sql->fetch(PDO::FETCH_ASSOC);
            
            if ($paciente) {
                // Se o paciente foi encontrado, criar um objeto paciente e retorná-lo
                $pacienteObj = new paciente();
                $pacienteObj->setId_paciente($paciente['id_paciente']);
                $pacienteObj->setNome($paciente['nome']);
                // Definir outras propriedades do paciente conforme necessário
                
                
                return $pacienteObj;
            } else {
                // Se o paciente não foi encontrado, retornar null ou uma mensagem de erro
                return null;
            }
        } catch (Exception $e) {
            // Lidar com exceções, se necessário
            echo "Erro ao buscar paciente: " . $e->getMessage();
            return null;
        }
    }

    public function buscarEmailPorId($id) {
        try {
            $sql = "SELECT email FROM pacientes WHERE id_paciente = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['email']; // Retorna o e-mail do paciente
            } else {
                return null; // Retorna null se o paciente não for encontrado
            }
        } catch (Exception $e) {
            echo "Erro ao buscar e-mail do paciente: " . $e->getMessage();
            return null;
        }
    }

        
    
    public function create(paciente $paciente) {
        

        try {
            $sql = "INSERT INTO pacientes (                   
                  nome,endereco,email,telefone,data_nasc)
                  VALUES (
                  :nome,:endereco,:email,:telefone,:data_nasc)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $paciente->getNome());
            $p_sql->bindValue(":endereco", $paciente->getEndereco());
            $p_sql->bindValue(":email", $paciente->getEmail());
            $p_sql->bindValue(":telefone", $paciente->getTelefone());
            $p_sql->bindValue(":data_nasc", $paciente->getData_nasc());

            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir paciente <br>" . $e . '<br>';
        }
    }

    public function read($where = '') {
        try {
            $sql = "SELECT * FROM pacientes";
            
            // Adiciona a cláusula WHERE se uma condição foi fornecida
            if (!empty($where)) {
                $sql .= " WHERE " . $where;
            }
            
            $sql .= " ORDER BY id_paciente ASC";
    
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    
     
    public function update(paciente $paciente) {
        try {
            
            // Instrução SQL para atualizar os dados do paciente
            $sql = "UPDATE pacientes SET
                        nome = :nome,
                        endereco = :endereco,
                        email = :email,
                        telefone = :telefone,
                        data_nasc = :data_nasc
                    WHERE id_paciente = :id_paciente";
    
            // Preparando a instrução SQL
            $p_sql = Conexao::getConexao()->prepare($sql);
    
            // Vinculando os valores aos parâmetros da instrução SQL
            $p_sql->bindValue(":nome", $paciente->getNome());
            $p_sql->bindValue(":endereco", $paciente->getEndereco());
            $p_sql->bindValue(":email", $paciente->getEmail());
            $p_sql->bindValue(":telefone", $paciente->getTelefone());
            $p_sql->bindValue(":data_nasc", $paciente->getData_nasc());
            $p_sql->bindValue(":id_paciente", $paciente->getId_paciente());

    
            return $p_sql->execute();
        } catch (Exception $e) {
                print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
    
    
    

    public function delete(paciente $paciente) {
        try {
            $sql = "DELETE FROM pacientes WHERE id_paciente = :id_paciente";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_paciente", $paciente->getId_paciente());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }

    private function listaUsuarios($row) {
        $paciente = new paciente();
        $paciente->setId_paciente($row['id_paciente']);
        $paciente->setNome($row['nome']);
        $paciente->setEndereco($row['endereco']);
        $paciente->setEmail($row['email']);
        $paciente->setTelefone($row['telefone']);
        $paciente->setData_nasc($row['data_nasc']);

        return $paciente;
    }


 }


 ?>
