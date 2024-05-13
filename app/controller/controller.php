<?php
include_once "../conexao/Conexao.php";
include_once "../model/paciente.php";
include_once "../dao/pacienteDAO.php";

//instancia as classes
$paciente = new paciente();
$pacientedao = new pacienteDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);



//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){
    $paciente->setNome($d['nome']);
    $paciente->setProce($d['proce']);

    $dataCon = date("Y-m-d", strtotime(str_replace('/', '-', $d['dataCon'])));
    $paciente->setDataCon($dataCon);
    
    $paciente->setSexo($d['sexo']);

    // Define a hora se o formato estiver correto
    if (preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $d['hora'])) {
        $paciente->setHora($d['hora']);
    } else {
        // Se o formato estiver incorreto, você pode exibir uma mensagem de erro ou lidar com isso de outra forma
        echo "Formato de hora inválido.";
    }

    $paciente->setObser($d['obser']);

    $pacientedao->create($paciente);

    header("Location: ../../");
}

else if(isset($_POST['editar'])){
    $paciente->setNome($d['nome']);
    $paciente->setProce($d['proce']);
    // Tratando a data de consulta para ajustá-la ao formato esperado
    $dataCon = date("Y-m-d", strtotime(str_replace('/', '-', $d['dataCon'])));
    $paciente->setDataCon($dataCon);

    $paciente->setHora($d['hora']);
    $paciente->setSexo($d['sexo']);
    $paciente->setObser($d['obser']);

    $pacientedao->update($paciente);
    


    header("Location: ../../");
}

// se a requisição for deletar
else if(isset($_GET['del'])){

    $paciente->setId($_GET['del']);

    $pacientedao->delete($paciente);

    header("Location: ../../");
}else{
    header("Location: ../../");
}