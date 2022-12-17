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
        <section class="container-fluid">
                <div class="row justify-content-md-center align-items-center">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <div class="container">
                            <div class="text-center">
                                <img src="../images/Logo.png" class="img-fluid p-3"/>
                                <h3 class="p-3">Sistema para Tratamentos Alternativos</h3>
                            </div><!--text-center-->
                            <form class="needs-validation" action="../controle/profissionalcontrole.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="acao" value="inserir">
                                <div class="row">
                                    <div class="col-8 mb-3">
                                        <input type="text" class="form-control" placeholder="Nome completo" name="nomeProfissional" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" class="form-control" placeholder="Numcrefito" name="numcrefito" id="" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="number" class="form-control" placeholder="RG" name="rg" id="" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="number" class="form-control" placeholder="CPF" name="cpf" id="" required>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="password" class="form-control" placeholder="Senha" name="senha" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="number" class="form-control" placeholder="Telefone" name="telefone" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="number" class="form-control" placeholder="Celular" name="celular" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="date" class="form-control" placeholder="Nascimento" name="nascimento" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="sltPaises" name="pais" required>
                                            <option value="País" selected disabled>País</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="sltEstados" name="estado" required>
                                            <option value="" selected disabled>Escolha um país</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="sltCidades" name="cidade" required>
                                            <option value="" selected disabled>Escolha um estado</option>
                                        </select>
                                    </div>
                                    <div class="col-5 mb-3">
                                        <input type="text" class="form-control" placeholder="Bairro" name="bairro" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" class="form-control" placeholder="Rua" name="rua" id="" required>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <input type="number" class="form-control" placeholder="Número" name="numero" id="" required>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <input type="text" class="form-control" placeholder="Complemento" name="complemento" id="" required>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="number" class="form-control" placeholder="CEP" name="cep" id="" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                    <input name="remember" class="form-check-input" type="checkbox" value="" id="" required>
                                    <label class="form-check-label ps-2" for="flexCheckDefault">
                                        Concordo com os termos de uso
                                    </label>
                                    </div>
                                    <div class="row justify-content-center p-4">
                                        <div class="col-auto">
                                            <input class="btn btn-primary" type="submit" value="Cadastrar"/>
                                        </div><!--col-->
                                        <div class="col-auto">
                                            <a href="../index.php">Possui uma conta? entre</a>
                                        </div>
                                    </div><!--row-->
                                </div>
                            </form><!--form-row-->
                        </div><!--container-->
                    </div><!--col2-md-->
                </div><!--row-->
        </section> 
    </body>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/verificaCampo.js"></script>
</html>