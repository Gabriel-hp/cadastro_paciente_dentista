<?php 
    include_once "./app/conexao/conexao.php";
    include_once "./app/dao/medicoDAO.php";
    include_once "./app/modelos/medico.php";
    


    //instancia as classes
    $medico = new medico();
    $medicodao = new medicoDAO();


    include __DIR__.'./app/includes/header.php';
    include __DIR__.'./app/includes/incial.php';
    include __DIR__.'./app/includes/listarMed.php'; 
    include __DIR__.'./app/includes/footer.php';



