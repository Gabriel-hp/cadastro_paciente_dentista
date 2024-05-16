<?php 
    include_once "./app/conexao/conexao.php";
    include_once "./app/dao/pacienteDAO.php";
    include_once "./app/modelos/paciente.php";
    


    //instancia as classes
    $paciente = new paciente();
    $pacientedao = new pacienteDAO();


    include __DIR__.'./app/includes/header.php';
    include __DIR__.'./app/includes/incial.php';
    include __DIR__.'./app/includes/formMed.php';
    include __DIR__.'./app/includes/footer.php';




