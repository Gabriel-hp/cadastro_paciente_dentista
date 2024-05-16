<?php

class Consulta {
    private $id_consulta;
    private $id_paciente;
    private $id_medico;
    private $data_consulta;
    private $hora_consulta;
    private $status;
    private $observacoes;

     //get 
    
     function getId_consulta() {
        return $this->id_consulta;
    }
        
    function getId_paciente() {
        return $this->id_paciente;
    }
        
    function getId_medico() {
        return $this->id_medico;
    }

    function getData_consulta() {
        return $this->data_consulta;
    }

    function getHora_consulta() {
        return $this->hora_consulta;
    }

    function getStatus() {
        return $this->status;
    }

    function getObservacoes() {
        return $this->observacoes;
    }


    //set
    function setId_consulta($id_consulta) {
        $this->id_consulta = $id_consulta;
    }

    function setId_medico($id_medico) {
        $this->id_medico = $id_medico;
    }

    function setId_paciente($id_paciente) {
        $this->id_paciente = $id_paciente;
    }


    function setData_consulta($data_consulta) {
        $this->data_consulta = $data_consulta;
    }

    function setHora_consulta($hora_consulta) {
        $this->hora_consulta = $hora_consulta;
    }


    function setStatus($status) {
        $this->status = $status;
    }

    function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }

}
?>
