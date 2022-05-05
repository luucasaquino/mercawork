<?php
session_start();
require('../../vendor/autoload.php');
if (empty($_SESSION['login'])) {
    header('location: ../login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include('../../templates/bootstrap.php'); ?>
    <title>MercaWork</title>
</head>

<body>
    <div class="container">
        Seja bem-vindo, <?php echo $_SESSION['email'] ?>!
        <br>
        <a href="perfil.php"> Perfil</a>| <a href="inicial.php">Início</a> | <a href="vagas.php">Vagas</a> | <a href="../../apply/apply_logout.php">Sair</a>
        <hr>
        <h1>Vagas</h1>
        <div class="row">
            <?php

            use App\Bd\EntidadeVaga;
            use App\Bd\EntidadeEmpresa;

            $vaga = new EntidadeVaga;
            $empresa = new EntidadeEmpresa;
            if ($dados_vaga = $vaga->select("cd_vaga, cargo, area, qtd, salario, descricao, dt_abertura, dt_fechamento")) {
                while ($row = $dados_vaga->fetch_object()) {
            ?>
                    <div class="col-sm-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row->cargo; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Área: <?php echo $row->area; ?></h6>
                                <p class="card-text">Quantidade de vagas: <?php echo $row->qtd; ?></p>
                                <p class="card-text">Salário: <?php echo $row->salario; ?></p>
                                <p class="card-text">Descrição: <?php echo $row->descricao; ?></p>
                                <p class="card-text">Data de abertura: <?php echo $row->dt_abertura; ?></p>
                                <p class="card-text">Data de fechamento: <?php echo $row->dt_fechamento; ?></p>
                                <button type="button" name="aplicar" class="aplicar" value="<?php echo $row->cd_vaga; ?>">APLICAR</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
               
            }

            ?>
        </div>
    </div>

    <br><br><br>
    </div>
</body>

</html>