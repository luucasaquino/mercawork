<?php
session_start();
if (empty($_SESSION['login'])) {
    header('location: ../login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

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
</body>

</html>