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
    <script src="../../js/alterar_vaga.js"></script>
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
            $id = $empresa->select("cd_empresa", "WHERE id_usuario = " . $_SESSION['login']);
            if ($dados_vaga = $vaga->select("cd_vaga, cargo, area, qtd, salario, descricao, dt_abertura, dt_fechamento", "WHERE id_empresa = $id->cd_empresa")) {
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
                                <button type="button" name="alterar" class="alterar" data-toggle="modal" data-target="#vaga" value="<?php echo $row->cd_vaga; ?>">ALTERAR</button>
                                <button type="button" name="excluir" class="excluir" data-toggle="modal" data-target="#ex<?php echo $row->cd_vaga; ?>" value="<?php echo $row->cd_vaga; ?>">EXCLUIR</button>
                                <?php  include('../../templates/modal/modal-excluir-vaga.php'); ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
                include('../../templates/modal/modal-vaga.php');
               
            }

            ?>
        </div>
    </div>

    <br><br><br>
    <a href="criar_vaga.php"><input type="button" value="CRIAR NOVA VAGA"></a>
    </div>
</body>

</html>