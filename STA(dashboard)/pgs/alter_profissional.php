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
                <h1>Informações do usuário</h1>
                <form class="row g-3 sta-fx" action="../controle/profissionalcontrole.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="alterar">
                    <input type="hidden" name="id_profissional" value="<?php echo $profissional->getId_profissional();?>">
                    <div class="col-md-3">
                        <label for="validationDefault01" class="form-label">Nome completo*</label>
                        <input type="text" class="form-control" id="validationDefault01" value="<?php echo $profissional->getNome();?>" name="nomeProfissional" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">RG do paciente*</label>
                        <input type="number" class="form-control"  aria-describedby="inputGroupPrepend2" name="rg" value="<?php echo $profissional->getRg()?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefaultUsername" class="form-label">CPF do paciente*</label>
                        <input type="number" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" value="<?php echo $profissional->getCpf();?>" name="cpf" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault03" class="form-label">Numcrefito</label>
                        <input type="text" class="form-control" value="<?php echo $profissional->getNumcrefito()?>" name="numcrefito">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault03" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $profissional->getEmail()?>" name="email">
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault03" class="form-label">Senha</label>
                        <input type="password" class="form-control" value="<?php echo $profissional->getSenha()?>" name="senha">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault04" class="form-label">Nascimento*</label>
                        <input type="date" class="form-control" id="validationDefault04" value="<?php echo $profissional->getNascimento()?>" name="nascimento" required>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Celular</label>
                        <input type="number" class="form-control" id="validationDefault05" value="<?php echo $profissional->getCelular()?>" name="celular" required>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Telefone</label>
                        <input type="number" class="form-control" value="<?php echo $profissional->getTelefone()?>" name="telefone">
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault06" class="form-label">País*</label>
                        <select class="form-select" id="sltPaises" name="pais" required>
                            <option value="<?php echo $profissional->getPais()?>" selected><?php echo $profissional->getPais()?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault07" class="form-label">Estado*</label>
                        <select class="form-select" id="sltEstados" name="estado" required>
                            <option selected value="<?php echo $profissional->getEstado()?>"><?php echo $profissional->getEstado()?></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault09" class="form-label">Cidade*</label>
                        <select class="form-select" id="sltCidades" name="cidade" required>
                            <option selected value="<?php echo $profissional->getCidade()?>"><?php echo $profissional->getCidade()?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault08" class="form-label">CEP*</label>
                        <input type="number" class="form-control" id="validationDefault08" value="<?php echo $profissional->getCep()?>" name="cep" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault10" class="form-label">Bairro*</label>
                        <input type="text" class="form-control" id="validationDefault10" value="<?php echo $profissional->getBairro()?>" name="bairro" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault11" class="form-label">Rua*</label>
                        <input type="text" class="form-control" id="validationDefault11" value="<?php echo $profissional->getRua()?>" name="rua" required>
                    </div>
                    <div class="col-md-2">
                        <label for="validationDefault12" class="form-label">Número*</label>
                        <input type="number" class="form-control" id="validationDefault12" value="<?php echo $profissional->getNumero()?>" name="numero" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault13" class="form-label">Complemento*</label>
                        <input type="text" class="form-control" id="validationDefault13" value="<?php echo $profissional->getComplemento()?>" name="complemento" required>
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