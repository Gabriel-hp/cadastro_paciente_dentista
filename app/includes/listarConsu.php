<main>

<div class="container">
        <h1 class="mt-4">
            Consultas agendadas
        </h1>

        <hr>

    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Acompanhe as consultas agendadas</p>
        </div>
    </nav>
    <hr>

        
        <div class="table-responsive">
             <table class="table table-sm table-bordered table-hover text-center">
                 <thead>
                     <tr>
                         <th>Paciente</th>
                         <th>Data da consulta</th>
                         <th>Hora da consulta</th>
                         <th>Médico responsável</th>
                         <th>Observaçao</th>
                         <th>Status</th>    
                         <th>Ações</th>     
                     </tr>
                 </thead>

                 <tbody>
                    <?php foreach ($consultaDao->read() as $consulta) : ?>
                        <tr>
                            <td>
                            <?php 
                                    $pacientedao = new PacienteDAO();
                                    $pacientes = $pacientedao->read();
                                    // Obter o ID do paciente da consulta atual
                                    $id_paciente = $consulta->getId_paciente();
                                    
                                    // Instanciar o DAO do paciente
                                    $pacientedao = new PacienteDAO();
                                    
                                    // Buscar o nome do paciente com base no ID
                                    $paciente = $pacientedao->buscarPorId($id_paciente);
                                    
                                    // Verificar se o paciente foi encontrado
                                    if ($paciente) {
                                        // Exibir o nome do paciente
                                        echo $paciente->getNome();
                                    } else {
                                        // Se o paciente não foi encontrado, exibir uma mensagem alternativa
                                        echo "Paciente não encontrado";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                   $data_consulta = $consulta->getData_consulta(); // Chame o método getdata_consulta() para obter a data
                                   $data_consulta = explode('-', $data_consulta); // Explode a data obtida
                                   $dia = $data_consulta[2]; // O dia está no índice 2
                                   $mes = $data_consulta[1]; // O mês está no índice 1
                                   $ano = $data_consulta[0]; // O ano está no índice 0
                                   echo $dia.'/'.$mes.'/'.$ano; // Imprime a data formatada
                                ?>
                            </td>
                            <td><?= $consulta->getHora_consulta()?></td>
                            <td>
                            <?php 
                                    $medicodao = new medicoDAO();
                                    $medicos = $medicodao->read();
                                    // Obter o ID do medico da consulta atual
                                    $id_medico = $consulta->getId_medico();
                                    
                                    // Instanciar o DAO do medico
                                    $medicodao = new medicoDAO();
                                    
                                    // Buscar o nome do medico com base no ID
                                    $medico = $medicodao->buscarPorId($id_medico);
                                    
                                    // Verificar se o medico foi encontrado
                                    if ($medico) {
                                        // Exibir o nome do medico
                                        echo $medico->getNome();
                                    } else {
                                        // Se o medico não foi encontrado, exibir uma mensagem alternativa
                                        echo "medico não encontrado";
                                    }
                                ?>
                            </td>
                            <td><?= $consulta->getObservacoes() ?></td>
                            <td><?= $consulta->getStatus() ?></td>

                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $consulta->getId_consulta() ?>">
                                    Editar
                                </button>
                                <a href="app/controladores/consultaController.php?del=<?= $consulta->getId_consulta()?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>


       
        

    </div>

        </div>

</main>