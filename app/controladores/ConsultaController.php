<?php
//phpMailer
include_once "../includes/enviar_email.php";



include_once "../conexao/conexao.php";
include_once "../modelos/consultas.php";
include_once "../dao/consultaDAO.php";

$consulta = new Consulta();
$consultaDao = new ConsultaDAO();

include_once "../dao/pacienteDAO.php"; // Certifique-se de incluir o arquivo pacienteDAO.php
include_once "../modelos/paciente.php"; // Certifique-se de incluir o arquivo pacienteDAO.php
include_once "../dao/medicoDAO.php";   // Certifique-se de incluir o arquivo medicoDAO.php
include_once "../modelos/medico.php";   // Certifique-se de incluir o arquivo medicoDAO.php

// Instancia as classes
$pacientedao = new pacienteDAO(); // Certifique-se de instanciar a classe PacienteDAO
$medicodao = new medicoDAO();     // Certifique-se de instanciar a classe MedicoDAO

$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])) {

    $consulta->setId_paciente($d['id_paciente']);
    $consulta->setId_medico($d['id_medico']);
    $consulta->setData_consulta($d['data_consulta']);
    $consulta->setHora_consulta($d['hora_consulta']);
    $consulta->setStatus($d['status']);
    $consulta->setObservacoes($d['observacoes']);

     // Insere a consulta no banco de dados
     if ($consultaDao->create($consulta)) {
        // Recupera os dados do paciente e do médico para enviar o e-mail de confirmação
        $nome_paciente = $pacientedao->buscarPorId($consulta->getId_paciente())->getNome(); // Corrigido
        $email_paciente = $pacientedao->buscarEmailPorId($consulta->getId_paciente()); // Corrigido
        $nome_medico = $medicodao->buscarPorId($consulta->getId_medico())->getNome(); // Corrigido
        $data_consulta = $consulta->getData_consulta(); // Corrigido
        $hora_consulta = $consulta->getHora_consulta(); // Corrigido
    
         // Chame a função para enviar o e-mail de confirmação
        if(enviarEmailConsultaMarcada($email_paciente, $nome_paciente, $data_consulta, $hora_consulta, $nome_medico)) {
            echo 'E-mail de confirmação enviado com sucesso!';
        } else {
            echo 'Erro ao enviar o e-mail de confirmação!';
        }
    }
    


    

    // Redireciona após a operação
    header("Location: ../../");
} else if(isset($_POST['editar'])) {

    $consulta->setId_paciente($d['id_paciente']);
    $consulta->setId_medico($d['id_medico']);
    $consulta->setData_consulta($d['data_consulta']);
    $consulta->setHora_consulta($d['hora_consulta']);
    $consulta->setStatus($d['status']);
    $consulta->setObservacoes($d['observacoes']);
    $consulta->setId_consulta($d['id_consulta']);

    $consultaDao->update($consulta);
    $result = $consultaDao->update($consulta);

        // Redirecione após a atualização
        if ($result) {
            header("Location: ../../");
        } else {
            echo "Erro ao atualizar o paciente.";
        }


} else if(isset($_GET['del'])) {
    
    $consulta->setId_consulta($_GET['del']);

    $consultaDao->delete($consulta);

    header("Location: ../../");

} else {

    header("Location: ../../");
}
?>
