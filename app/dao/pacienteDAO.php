<?php
/*
    Criação da classe paciente com o CRUD
*/
class pacienteDAO{

        
    
    public function create(paciente $paciente) {

        

        try {
            $sql = "INSERT INTO paciente (                   
                  nome,proce,dataCon,sexo,obser,hora)
                  VALUES (
                  :nome,:proce,:dataCon,:sexo,:obser,:hora)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $paciente->getNome());
            $p_sql->bindValue(":proce", $paciente->getProce());
            $p_sql->bindValue(":dataCon", $paciente->getDataCon());
            $p_sql->bindValue(":sexo", $paciente->getSexo());
            $p_sql->bindValue(":obser", $paciente->getObser());
            $p_sql->bindValue(":hora", $paciente->getHora());

            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir paciente <br>" . $e . '<br>';
        }
    }

    public function read($where = '') {
        try {
            $sql = "SELECT * FROM paciente";
            
            // Adiciona a cláusula WHERE se uma condição foi fornecida
            if (!empty($where)) {
                $sql .= " WHERE " . $where;
            }
            
            $sql .= " ORDER BY id ASC";
    
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
            $sql = "UPDATE paciente SET
                nome = :nome,
                proce = :proce,
                dataCon = :dataCon,
                hora = :hora,
                sexo = :sexo, 
                obser = :obser
                WHERE id = :id";
    
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $paciente->getNome());
            $p_sql->bindValue(":proce", $paciente->getProce());
            
            // Ajuste da data para o formato 'Y-m-d'
            $dataCon = date("Y-m-d", strtotime(str_replace('/', '-', $paciente->getDataCon())));
            $p_sql->bindValue(":dataCon", $dataCon);
            $p_sql->bindValue(":hora", $hora);
            $p_sql->bindValue(":sexo", $paciente->getSexo());
            $p_sql->bindValue(":id", $paciente->getId());
            $p_sql->bindValue(":obser", $paciente->getObser());
    
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }
    

    public function delete(paciente $paciente) {
        try {
            $sql = "DELETE FROM paciente WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $paciente->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    

    private function listaUsuarios($row) {
        $paciente = new paciente();
        $paciente->setId($row['id']);
        $paciente->setNome($row['nome']);
        $paciente->setProce($row['proce']);
        $paciente->setDataCon($row['dataCon']);
        $paciente->setHora($row['hora']);
        $paciente->setSexo($row['sexo']);
        $paciente->setObser($row['obser']);


        return $paciente;
    }
 }

 ?>
