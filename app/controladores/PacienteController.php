<?php
include_once "../conexao/conexao.php";
include_once "../modelos/paciente.php";
include_once "../dao/pacienteDAO.php";

//instancia as classes
$paciente = new paciente();
$pacientedao = new pacienteDAO();

// buscar de paciente
// Verifica se o parâmetro 'nome' foi passado
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    // Instancia o DAO
    $pacienteDAO = new pacienteDAO();

    // Faz a busca
    $pacientes = $pacienteDAO->buscarPorNome($nome);

    // Exibe os resultados
    if ($pacientes) {
        foreach ($pacientes as $paciente) {
            echo "ID: " . $paciente->getId_paciente() . "<br>";
            echo "Nome: " . $paciente->getNome() . "<br>";
            echo "Especialidade: " . $paciente->getEspecialidade() . "<br>";
            echo "Email: " . $paciente->getEmail() . "<br>";
            echo "Telefone: " . $paciente->getTelefone() . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum médico encontrado com o nome '$nome'.";
    }
} else {
    echo "Por favor, insira um nome para buscar.";
}

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

    header("Location: ../../listaPac.php");
}

else if (isset($_POST['editar'])) {
    // Crie um objeto Paciente e defina os valores
    $paciente->setNome($d['nome']);
    $paciente->setEndereco($d['endereco']);
    $paciente->setEmail($d['email']);
    $paciente->setTelefone($d['telefone']);
    $paciente->setData_nasc($d['data_nasc']);
    $paciente->setId_paciente($d['id_paciente']);

    $pacientedao->update($paciente);
    $result = $pacientedao->update($paciente);

    print_r($_POST);
 
    // Redirecione após a atualização
    if ($result) {
        header("Location: ../../listaPac.php");
    } else {
        echo "Erro ao atualizar o paciente.";
    }
}

// se a requisição for deletar
else if(isset($_GET['del'])){

    $paciente->setId_paciente($_GET['del']);

    $pacientedao->delete($paciente);

    header("Location: ../../listaPac.php");
    
}else{
    header("Location: ../../listaPac.php");
}

