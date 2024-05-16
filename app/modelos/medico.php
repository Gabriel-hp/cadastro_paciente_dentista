<?php 

class medico{
    
    private $id_medico;
    private $nome;
    private $especialidade;
    private $email;
    private $telefone;
    
    //get 
    
    function getId_medico() {
        return $this->id_medico;
    }

    function getNome() {
        return $this->nome;
    }

    function getEspecialidade() {
        return $this->especialidade;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }


    //set

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }


    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }


    function setEmail($email) {
        $this->email = $email;
    }

}
?>