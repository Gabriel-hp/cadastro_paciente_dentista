<main>

 

    <h1 class="mt-3">Consultas marcadas</h1>
        <hr>

       <section>
        
       </section>


        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome completo</th>
                        <th>Procedimento</th>
                        <th>Data</th>
                        <th>Horario</th>
                        <th>Situação</th>
                        <th>Observação</th>
                        <th>Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientedao->read() as $paciente) : ?>
                        <tr>

                            <td><?= $paciente->getNome() ?></td>
                            <td><?= $paciente->getProce() ?></td>
                            <td>
                                <?php 
                                   $dataCon = $paciente->getdataCon(); // Chame o método getdataCon() para obter a data
                                   $dataCon = explode('-', $dataCon); // Explode a data obtida
                                   $dia = $dataCon[2]; // O dia está no índice 2
                                   $mes = $dataCon[1]; // O mês está no índice 1
                                   $ano = $dataCon[0]; // O ano está no índice 0
                                   echo $dia.'/'.$mes.'/'.$ano; // Imprime a data formatada
                                ?>
                            </td>
                            <td><?= $paciente->getHora() ?></td>
                            <td><?= $paciente->getSexo()?></td>
                            <td><?= $paciente->getobser()?></td>

                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $paciente->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/controller.php?del=<?= $paciente->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>


                        <!-- Modal para editar -->
                        <div class="modal fade" id="editar><?= $paciente->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" name="nome" value="<?= $paciente->getNome() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Procedimento</label>
                                                    <select name="proce" id="proce" class="form-control">
                                                        <option  value="<?= $paciente->getProce()?>"></option>
                                                        <option value="Check-UP">Check-UP</option>
                                                        <option value="Manutenção de aparelho">Manutenção de aparelho</option>
                                                        <option value="Consulta">Consulta</option>
                                                        <option value="Manutenção Faceta">Manutenção Faceta</option>
                                                        
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-3">
                                                    <label>Data</label>
                                                    <input type="date" name="idade" value="<?= $paciente->getDataCon() ?>" class="form-control" require />

                                                </div>

                                                <div class="col-md-3">
                                                    <label>hora</label>
                                                    <input type="date" name="idade" value="<?= $paciente->getHora() ?>" class="form-control" require />

                                                </div>
                                                <div class="col-md-3">
                                                    <label>Situação</label>
                                                    <select name="sexo" class="form-control">
                                                        <?php if ($paciente->getSexo() == 'F') : ?>
                                                            <option value="Agendado">Agendado</option>
                                                            <option value="Em atendimento">Em atendimento</option>
                                                            <option value="Atentido">Atentido</option>
                                                            <option value="Adiado">Adiado</option>
                                                            <option value="Cancelado">Cancelado</option>
                                                        <?php else : ?>
                                                            <option value="Agendado">Agendado</option>
                                                            <option value="Em atendimento">Em atendimento</option>
                                                            <option value="Atentido">Atentido</option>
                                                            <option value="Adiado">Adiado</option>
                                                            <option value="Cancelado">Cancelado</option>
                                                        <?php endif ?>

                                                    </select>
                                                </div>

                                                <div class="col-md-5">
                                                    <label>Observação</label>
                                                    <input type="text" name="nome" value="<?=$paciente->getobser()?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $paciente->getId() ?>" />
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

</main>