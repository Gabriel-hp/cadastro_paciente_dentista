<?php
include_once "../conexao/conexao.php";
include_once "../modelos/paciente.php";
include_once "../dao/pacienteDAO.php";

//instancia as classes
$paciente = new paciente();
$pacientedao = new pacienteDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){
    $paciente->setNome($d['nome']);
    $paciente->setEndereco($d['endereco']);
    $paciente->setEmail($d['email']);
    $paciente->setTelefone($d['telefone']);
    $paciente->setData_nasc($d['data_nasc']);
    

    $pacientedao->create($paciente);

    header("Location: ../../");
}

else if(isset($_POST['editar'])){
    $paciente->setNome($d['nome']);
    $paciente->setEndereco($d['endereco']);
    $paciente->setEmail($d['email']);
    $paciente->setTelefone($d['telefone']);
    $paciente->setData_nasc($d['data_nasc']);


    $pacientedao->update($paciente);

    header("Location: ../../");
}

// se a requisição for deletar
else if(isset($_GET['del'])){

    $paciente->setId_paciente($_GET['del']);

    $pacientedao->delete($paciente);

    header("Location: ../../");
    
}else{
    header("Location: ../../");
}