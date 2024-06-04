<title >Consultas marcadas</title>
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
                                    $pacientedao = new pacienteDAO();
                                    $pacientes = $pacientedao->read();
                                    // Obter o ID do paciente da consulta atual
                                    $id_paciente = $consulta->getId_paciente();
            
                                    
                                    // Instanciar o DAO do paciente
                                    $pacientedao = new pacienteDAO();
                                    
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?=  $consulta->getId_consulta() ?>" >
                                    Editar consulta
                                </button>
                                <a href="app/controladores/consultaController.php?del=<?= $consulta->getId_consulta()?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal para editar -->

                        <div class="modal fade" id="editar<?= $consulta->getId_consulta() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controladores/ConsultaController.php" method="POST">

                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="id_paciente" >Paciente:</label>
                                                <select id="id_paciente" value="<?=$consulta->getId_paciente() ?>" class="form-control" name="id_paciente" required>
                                                <option class="form-control" ></option>
                                                <?php
                                                // Recupere a lista de pacientes do banco de dados usando o PacienteDAO
                                                $pacientedao = new PacienteDAO();
                                                $pacientes = $pacientedao->read();
                                                foreach ($pacientes as $paciente) {
                                                    echo '<option value="' . $paciente->getId_paciente() . '">' . $paciente->getNome() . '</option>';
                                                }
                                                ?>
                                            </select><br><br>


                                            </div>
                                            <div class="col-md-6">
                                            <label for="id_medico" value="<?= $medico->getId_medico() ?>" >Médico:</label>
                                                <select id="id_medico" class="form-control" name="id_medico" required>
                                                    <option class="form-control"  ></option>
                                                    <?php
                                                    // Recupere a lista de médicos do banco de dados usando o MedicoDAO
                                                    $medicodao = new MedicoDAO();
                                                    $medicos = $medicodao->read();
                                                    foreach ($medicos as $medico) {
                                                        echo '<option value="' . $medico->getId_medico() . '">' . $medico->getNome() . '</option>';
                                                    }
                                                    
                                                    ?>
                                                </select><br><br>
                                            </div>
                                        </div>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label>Data</label>
                                                    <input type="date" name="data_consulta" value="<?= $consulta->getData_consulta() ?>" class="form-control" require />
                                                </div>
                                           
                                       
                                            <div class="col-md-2">
                                                <label>Hora</label>
                                                <input type="time" name="hora_consulta"  value="<?= $consulta->getHora_consulta() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-4">
                                                <label for="status" value="<?= $consulta->getStatus() ?>">Status:</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option value="marcada">Marcada</option>
                                                    <option value="cancelada">Cancelada</option>
                                                    <option value="realizada">Realizada</option>
                                                </select><br><br>
                                            </div>

                                            
                                            <div class="md-8">
                                                <label for="observacoes">Observações:</label><br>
                                                <textarea id="observacoes" name="observacoes" rows="2" cols="10" class="form-control"></textarea><br><br>
                                            </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id_consulta" value="<?= $consulta->getId_consulta() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Editar</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        
                        <!-- Fim-Modal -->

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>


       
        

    </div>

        </div>

</main>