<title>Pacientes cadastrados</title>
<main>

    <h1 class="mt-3">Pacientes cadastrados</h1>
        <hr>
        <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Lista de pacientes cadastrados</p>
        </div>
    </nav>

       
       <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome completo</th>
                        <th>Endereço</th>
                        <th>Data de nascimento</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientedao->read() as $paciente) : ?>
                        <tr>

                            <td><?= $paciente->getNome() ?></td>
                            <td><?= $paciente->getEndereco() ?></td>
                            <td>
                                <?php 
                                   $data_nasc = $paciente->getData_nasc(); // Chame o método getdataCon() para obter a data
                                   $data_nasc = explode('-', $data_nasc); // Explode a data obtida
                                   $dia = $data_nasc[2]; // O dia está no índice 2
                                   $mes = $data_nasc[1]; // O mês está no índice 1
                                   $ano = $data_nasc[0]; // O ano está no índice 0
                                   echo $dia.'/'.$mes.'/'.$ano; // Imprime a data formatada
                                ?>
                            </td>
                            <td><?= $paciente->getEmail() ?></td>
                            <td><?= $paciente->getTelefone()?></td>

                            <td class="text-center">
                                <!-- Botão para abrir o modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editar<?= $paciente->getId_paciente() ?>" >
                                    Editar Paciente
                                </button>
                                <a href="app/controladores/PacienteController.php?del=<?= $paciente->getId_paciente()?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>


                        <!-- Modal de edição -->
                        <div class="modal fade" id="editar<?= $paciente->getId_paciente() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Paciente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="app/controladores/PacienteController.php" method="POST">
                                            <div class="row">

                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $paciente->getNome() ?>" class="form-control" require />
                                                </div>

                                                <div class="col-md-7">
                                                    <label>Endereço</label>
                                                        <input type="text" name="endereco" value="<?= $paciente->getEndereco() ?>" autofocus class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row">
                                       
                                            <div class="col-md-5">
                                                <label>E-mail</label>
                                                <input type="text" name="email"  value="<?= $paciente->getEmail() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-4">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" placeholder="(92) 0000-0000" value="<?= $paciente->getTelefone() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-3">
                                                <label>Data de Nascimento</label>
                                                <input type="date" name="data_nasc" value="<?= $paciente->getData_nasc() ?>" autofocus class="form-control"/>
                                            </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id_paciente" value="<?= $paciente->getId_paciente() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Editar</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal para editar
                        <div class="modal fade" id="editar<?= $paciente->getId_paciente()?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controladores/PacienteController.php" method="POST">
                                            <div class="row">

                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $paciente->getNome() ?>" class="form-control" require />
                                                </div>

                                                <div class="col-md-7">
                                                    <label>Endereço</label>
                                                        <input type="text" name="endereco" value="<?= $paciente->getEndereco() ?>" autofocus class="form-control" required/>
                                                    
                                                
                                                </div>
                                            </div>
                                            <div class="row">
                                       
                                            <div class="col-md-5">
                                                <label>E-mail</label>
                                                <input type="text" name="email"  value="<?= $paciente->getEmail() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-4">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" placeholder="(92) 0000-0000" value="<?= $paciente->getTelefone() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-3">
                                                <label>Data de Nascimento</label>
                                                <input type="date" name="data_nasc" value="<?= $paciente->getData_nasc() ?>" autofocus class="form-control"/>
                                            </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $paciente->getId_paciente() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Editar</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                         Fim-Modal -->
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>


       
        

    </div>

</main>