<?php 

class Paciente{
    
    private $id;
    private $nome;
    private $proce;
    private $dataCon;
    private $hora;
    private $sexo;
    private $obser;

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getProce() {
        return $this->proce;
    }

    function getDataCon() {
        return $this->dataCon;
        
    }

    function getHora() {
        return $this->hora;
        
    }

    function getObser() {
        return $this->obser;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setObser($obser) {
        $this->obser = $obser;
    }


    function setNome($nome) {
        $this->nome = $nome;
    }

    function setProce($proce) {
        $this->proce = $proce;
    }

    function setDataCon($dataCon) {
        $this->dataCon = $dataCon;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

}
?>