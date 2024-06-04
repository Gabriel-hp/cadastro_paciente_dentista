<title >Marcar consultas</title>
<main>


<h1 class="mt-3">Agenda nova consulta</h1>
        <hr>

    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Preencha os campos abaixo para realizar uma nova consulta</p>
        </div>
    </nav>


    <form action="app/controladores/ConsultaController.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <label for="id_paciente">Paciente:</label>
                    <select id="id_paciente" class="form-control" name="id_paciente" required>
                    <option value="" class="form-control">Selecione o Paciente</option>
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
                <label for="id_medico" >Médico:</label>
                    <select id="id_medico" class="form-control" name="id_medico" required>
                        <option value="" class="form-control">Selecione o Médico</option>
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
                    <label for="data_consulta">Data da Consulta:</label>
                    <input autofocus class="form-control" type="date" id="data_consulta" name="data_consulta" required><br><br>
                </div>
               
            
                <div class="col-md-2">
                    <label for="hora_consulta">Hora da Consulta:</label>
                    <input autofocus class="form-control" type="time" id="hora_consulta" name="hora_consulta" required><br><br>
                </div>
                <div class="col-md-2">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="marcada">Marcada</option>
                        <option value="cancelada">Cancelada</option>
                        <option value="realizada">Realizada</option>
                    </select><br><br>
                </div>
                </div>
                <div class="md-4">
                    <label for="observacoes">Observações:</label><br>
                    <textarea id="observacoes" name="observacoes" rows="2" cols="10" class="form-control"></textarea><br><br>
                </div>
                <div class="col-md-5">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Marcar consulta</button>
                </div>
    
            
            
        </div>
    </form>


</main>