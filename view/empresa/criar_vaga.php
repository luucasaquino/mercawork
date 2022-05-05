<?php
session_start();
if (empty($_SESSION['login'])) {
    header('location: ../login.php');
}
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaWork</title>
</head>

<body>
    Seja bem-vindo, <?php echo $_SESSION['email'] ?>!
    <br>
    <a href="perfil.php"> Perfil</a>| <a href="inicial.php">Início</a> | <a href="vagas.php">Vagas</a> | <a href="../../apply/apply_logout.php">Sair</a>
    <hr>
    <h1>Criar vaga</h1>
    <form action="../../apply/apply_criar_vaga.php" method="POST">
        Cargo da vaga <input type="text" name="cargo"><br>
        Área de atuação da vaga <input type="text" name="area"><br>
        Quantidade de vagas <input type="number" name="qtd"><br>
        Salário <input type="number" name="sal" step="100"><br>
        Descrição da vaga <textarea name="desc" cols="30" rows="10"></textarea><br>
        Data de fechamento <input type="date" name="dt_fechamento" value="<?php echo date('Y-m-d'); ?>"><br>
        <input type="submit" name="criar" value="CRIAR">
    </form>
</body>

</html>