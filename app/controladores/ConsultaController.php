<?php
include_once "../conexao/conexao.php";
include_once "../modelos/consultas.php";
include_once "../dao/consultaDAO.php";

$consulta = new Consulta();
$consultaDao = new ConsultaDAO();

$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])) {

    $consulta->setId_paciente($d['id_paciente']);
    $consulta->setId_medico($d['id_medico']);
    $consulta->setData_consulta($d['data_consulta']);
    $consulta->setHora_consulta($d['hora_consulta']);
    $consulta->setStatus($d['status']);
    $consulta->setObservacoes($d['observacoes']);

    $consultaDao->create($consulta);

    header("Location: ../../");
} else if(isset($_POST['editar'])) {

    $consulta->setId_paciente($d['id_paciente']);
    $consulta->setId_medico($d['id_medico']);
    $consulta->setData_consulta($d['data_consulta']);
    $consulta->setHora_consulta($d['hora_consulta']);
    $consulta->setStatus($d['status']);
    $consulta->setObservacoes($d['observacoes']);
    $consultaDao->update($consulta);

} else if(isset($_GET['del'])) {
    
    $consulta->setId_consulta($_GET['del']);

    $consultaDao->delete($consulta);

    header("Location: ../../");

} else {

    header("Location: ../../");
}
?>
