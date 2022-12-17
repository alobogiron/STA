<?php
    session_start();
    include_once("../modelo/profissional.php");
    
    if(!isset($_SESSION["proflogado"])){
        header("location: ../index.php");
    }
    
    $profissional = unserialize($_SESSION["proflogado"]);
    $id_profissional = $profissional->getId_profissional();
?>
<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" href="../css/alertify.min.css" />
        <link rel="stylesheet" href="../css/themes/default.min.css" />
        <link rel="stylesheet" type="text/css" href="../scss/styles.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../css/alertify.min.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/functions.js"></script>

        <?php include_once("../construct/header.php");?>

        <section class="content regis">
            <div class="container">
                <h1>Cadastro de paciente</h1>
                <form class="row g-3 sta-fx" action="../controle/pacientecontrole.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="inserir">
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nome completo*</label>
                        <input type="text" class="form-control" id="validationDefault01" value="" required name="nomePaciente">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefaultUsername" class="form-label">CPF do paciente*</label>
                        <input type="number" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required name="cpf">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault03" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault04" class="form-label">Nascimento*</label>
                        <input type="date" class="form-control" id="validationDefault04" required name="nascimento">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Cel. do paciente*</label>
                        <input type="number" class="form-control" id="validationDefault05" required name="celular">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Tel. do paciente</label>
                        <input type="number" class="form-control" name="telefone">
                    </div>
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Nome do pai</label>
                        <input type="text" class="form-control" name="nomePai">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Contato pai</label>
                        <input type="text" class="form-control" name="contatoPai">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Nome da mãe</label>
                        <input type="text" class="form-control" name="nomeMae">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Contato mãe</label>
                        <input type="text" class="form-control" name="contatoMae">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault06" class="form-label">País*</label>
                        <select class="form-select" id="sltPaises" required name="pais">
                            <option selected disabled value="">Escolha um país</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault07" class="form-label">Estado*</label>
                        <select class="form-select" id="sltEstados" required name="estado">
                            <option selected disabled value="">Escolha um estado</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault09" class="form-label">Cidade*</label>
                        <select class="form-select" id="sltCidades" required name="cidade">
                            <option selected disabled value="">Escolha uma cidade</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault08" class="form-label">CEP*</label>
                        <input type="number" class="form-control" id="validationDefault08" required name="cep">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault10" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="validationDefault10" required name="bairro">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault11" class="form-label">Rua*</label>
                        <input type="text" class="form-control" id="validationDefault11" required name="rua">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault12" class="form-label">Número*</label>
                        <input type="number" class="form-control" id="validationDefault12" required name="numero">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault13" class="form-label">Complemento*</label>
                        <input type="text" class="form-control" id="validationDefault13" required name="complemento">
                    </div>
                    <div class="col-12">
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                        <a href="../pgs/paciente_menu.php" class="btn btn-danger m-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </section><!--content-->
    </body>
</html>