<main>

    <h1 class="mt-3">medicos cadastrados</h1>
        <hr>

        <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Lista de pacientes cadastrados</p>
        </div>
    </nav>
    <hr>

       
       <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome completo</th>
                        <th>Especialidade</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
            
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($medicodao->read() as $medico) : ?>
                        <tr>

                            <td><?= $medico->getNome() ?></td>
                            <td><?= $medico->getEspecialidade() ?></td>
                            <td><?= $medico->getEmail() ?></td>
                            <td><?= $medico->getTelefone()?></td>

                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $medico->getId_medico() ?>">
                                    Editar
                                </button>
                                <a href="app/controladores/medicoController.php?del=<?= $medico->getId_medico()?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>


                        <!-- Modal para editar -->
                        <div class="modal fade" id="editar><?= $medico->getId_medico() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/controller.php" method="POST">
                                            <div class="row">

                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $medico->getNome() ?>" class="form-control" require />
                                                </div>

                                                <div class="col-md-5">
                                                    <label>Especialidade</label>
                                                    <input type="text" name="especialidade" value="<?= $medico->getEspecialidade() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                       
                                            <div class="col-md-5">
                                                <label>E-mail</label>
                                                <input type="text" name="email"  value="<?= $medico->getEmail() ?>" class="form-control" required />
                                            </div>

                                            <div class="col-md-4">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" placeholder="(92) 0000-0000" value="<?= $medico->getTelefone() ?>" class="form-control" required />
                    </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $medico->getId_medico() ?>" />
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

</main>