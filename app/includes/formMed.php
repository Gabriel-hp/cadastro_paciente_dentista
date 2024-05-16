<main>

    <h1 class="mt-3">Cadastrar pacientes</h1>
        <hr>
    

    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
           <p>Preencha os campos abaixo para realizar o cadastro</p>
        </div>
    </nav>

    <hr>

    
    <div class="container">
        <form action="app/controladores/MedicoController.php" method="POST">
            <div class="row">
                <div class="col-md-5">
                    <label>Nome completo</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" required/>
                </div>

                <div class="col-md-3 ">
                <label>Especialidade</label>
                    <input type="text" name="especialidade" value="" autofocus class="form-control" required/>
                </div>

                <div class="col-md-3">
                    <label>E-mail</label>
                    <input type="email" name="email"  value="" class="form-control" required />
                </div>

                <div class="col-md-4">
                    <label>Telefone</label>
                    <input type="text" name="telefone" placeholder="(92) 0000-0000" value="" class="form-control" required />
                </div>
                
                <div class="col-md-5">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastra médico</button>
                </div>
            </div>
        </form>



</main>