<main>

    <section>
        <a href="index.php">
        <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Marcar consulta</h2>

    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Preencha os campos abaixo para realizar o cadastro</p>
        </div>
    </nav>
    <div class="container">
        <form action="app/controller/controller.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label>Nome completo</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" required/>
                </div>
                <div class="col-md-4 ">
                <label>Procedimento</label>
                <select name="proce" id="proce" class="form-control">
                    <option value="">--Selecione um Procedimento--</option>
                    <option value="Check-UP">Check-UP</option>
                    <option value="Manutenção de aparelho">Manutenção de aparelho</option>
                    <option value="Consulta">Consulta</option>
                    <option value="Manutenção Faceta">Manutenção Faceta</option>
                    </select>
                </div>

                

                <div class="col-md-2">
                    <label>Data para consulta</label>
                    <input type="date" placeholder="00/00/0000" name="dataCon" value="" class="form-control" required />
                </div>

                <div class="col-md-2">
                    <label>Horario da consulta</label>
                    <input type="time" name="hora" value="" class="form-control" required />
                </div>

                <div class="col-md-2">
                    <label>Situação</label>
                    <select name="sexo" class="form-control">
                        <option value="Agendado">Agendado</option>
                        <option value="Em atendimento">Em atendimento</option>
                        <option value="Atentido">Atentido</option>
                        <option value="Adiado">Adiado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>

                <div class="col-md-5">
                    <label>Observação</label>
                    <input type="text" name="obser" value="" autofocus class="form-control"/>
                </div>
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Marcar consulta</button>
                </div>
            </div>
        </form>


</main>