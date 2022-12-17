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

        <?php
            include_once("../dao/pacienteDAO.php");
            $pacienteDAO = new PacienteDAO();
            $resultado = $pacienteDAO->pegarPorId($_GET["id_paciente"]);
            $linha = $resultado[0];
        ?>
        <?php include_once("../construct/header.php");?>
        <section class="content regis">
            <div class="container">
                <h1>Registro de Paciente</h1>
                <form class="row g-3 sta-fx" action="../controle/pacientecontrole.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="alterar">
                    <input type="hidden" name="id_paciente" value="<?php echo $linha['id_paciente'] ?>">
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nome completo*</label>
                        <input type="text" class="form-control" id="validationDefault01" value="<?php echo $linha['nomePaciente']?>" name="nomePaciente" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefaultUsername" class="form-label">CPF do paciente*</label>
                        <input type="number" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" value="<?php echo $linha['cpf']?>" name="cpf" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault03" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $linha['email']?>" name="email">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault04" class="form-label">Nascimento*</label>
                        <input type="date" class="form-control" id="validationDefault04" value="<?php echo $linha['nascimento']?>" name="nascimento" required>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Cel. do paciente*</label>
                        <input type="number" class="form-control" id="validationDefault05" value="<?php echo $linha['celular']?>" name="celular" required>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Tel. do paciente</label>
                        <input type="number" class="form-control" value="<?php echo $linha['telefone']?>" name="telefone">
                    </div>
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-3">
                        <label for="" class="form-label">Nome do pai</label>
                        <input type="text" class="form-control" value="<?php echo $linha['nomePai']?>" name="nomePai">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Contato pai</label>
                        <input type="text" class="form-control" value="<?php echo $linha['contatoPai']?>" name="contatoPai">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Nome da mãe</label>
                        <input type="text" class="form-control" value="<?php echo $linha['nomeMae']?>" name="nomeMae">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Contato mãe</label>
                        <input type="text" class="form-control" value="<?php echo $linha['contatoMae']?>" name="contatoMae">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault06" class="form-label">País*</label>
                        <select class="form-select" id="sltPaises" name="pais" required>
                            <option value="<?php echo $linha['pais']?>" selected><?php echo $linha['pais']?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault07" class="form-label">Estado*</label>
                        <select class="form-select" id="sltEstados" name="estado" required>
                            <option selected value="<?php echo $linha['estado']?>"><?php echo $linha['estado']?></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault09" class="form-label">Cidade*</label>
                        <select class="form-select" id="sltCidades" name="cidade" required value="<?php echo $linha['cidade']?>">
                            <option selected value="<?php echo $linha['cidade']?>"><?php echo $linha['cidade']?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault08" class="form-label">CEP*</label>
                        <input type="number" class="form-control" id="validationDefault08" value="<?php echo $linha['cep']?>" name="cep" required>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault10" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="validationDefault10" value="<?php echo $linha['bairro']?>" name="bairro" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault11" class="form-label">Rua*</label>
                        <input type="text" class="form-control" id="validationDefault11" value="<?php echo $linha['rua']?>" name="rua" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault12" class="form-label">Número*</label>
                        <input type="number" class="form-control" id="validationDefault12" value="<?php echo $linha['numero']?>" name="numero" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault13" class="form-label">Complemento*</label>
                        <input type="text" class="form-control" id="validationDefault13" value="<?php echo $linha['complemento']?>" name="complemento" required>
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