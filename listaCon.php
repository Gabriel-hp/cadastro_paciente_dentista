<?php 
//chama as classes CONSULTA 
include_once "./app/dao/consultaDAO.php";
include_once "./app/modelos/consultas.php";

//chama as classes PACIENTES
include_once "./app/dao/pacienteDAO.php";
include_once "./app/modelos/paciente.php";

//chama as classes MEDICO
include_once "./app/dao/medicoDAO.php";
include_once "./app/modelos/medico.php";

//instancia as classes CONSULTA 
$consulta = new Consulta();
$consultaDao = new ConsultaDAO();


$paciente = new paciente();
$pacientedao = new pacienteDAO();

//instancia as classes MEDICO
$medico = new medico();
$medicoDao = new medicoDAO();


include __DIR__.'./app/includes/listarConsu.php'; 




