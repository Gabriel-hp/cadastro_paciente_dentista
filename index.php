<?php 

    include_once "./app/conexao/Conexao.php";
    include_once "./app/dao/pacienteDAO.php";
    include_once "./app/model/paciente.php";
    


    //instancia as classes
    $paciente = new paciente();
    $pacientedao = new pacienteDAO();

    include __DIR__.'./app/includes/header.php';
    include __DIR__.'./app/includes/listarUsu.php';
    include __DIR__.'./app/includes/footer.php';


