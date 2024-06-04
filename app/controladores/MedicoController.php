<?php
include_once "../conexao/conexao.php";
include_once "../modelos/medico.php";
include_once "../dao/medicoDAO.php";

//instancia as classes
$medico = new medico();
$medicodao = new medicoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){
    $medico->setNome($d['nome']);
    $medico->setEspecialidade($d['especialidade']);
    $medico->setEmail($d['email']);
    $medico->setTelefone($d['telefone']);
    

    $medicodao->create($medico);

    header("Location: ../../listaMed.php");
}

/*else if(isset($_POST['editar'])){
    $medico->setNome($d['nome']);
    $medico->setEspecialidade($d['especialidade']);
    $medico->setEmail($d['email']);
    $medico->setTelefone($d['telefone']);


    $medicodao->update($medico);

    header("Location: ../../listaMed.php");

    print_r($medico);
}*/

else if (isset($_POST['editar'])) {
    // Crie um objeto Paciente e defina os valores
    $medico->setNome($d['nome']);
    $medico->setEspecialidade($d['especialidade']);
    $medico->setEmail($d['email']);
    $medico->setTelefone($d['telefone']);
    $medico->setId_medico($d['id_medico']);

    $medicodao->update($medico);
    $result = $medicodao->update($medico);

 
    // Redirecione após a atualização
    if ($result) {
        header("Location: ../../listaMed.php");
    } else {
        echo "Erro ao atualizar o paciente.";
    }
}



// se a requisição for deletar
else if(isset($_GET['del'])){

    $medico->setId_medico($_GET['del']);

    $medicodao->delete($medico);

    header("Location: ../../listaMed.php");
    
}else{
    header("Location: ../../listaMed.php");
}