<?php 

class paciente{
    
    private $id_paciente;
    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    private $data_nasc;
    
    //get 
    
    function getId_paciente() {
        return $this->id_paciente;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getData_nasc() {
        return $this->data_nasc;
    }

    //set

    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
        
    }


    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }


    function setEmail($email) {
        $this->email = $email;
    }

    function setData_nasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }


}
?>