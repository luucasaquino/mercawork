<?php
session_start();
require '../../vendor/autoload.php';
if(empty($_SESSION['login'])){
    header('location: ../login.php');
}

use App\Bd\EntidadeProfissional;
use App\Bd\EntidadeUsuario;

$profissional = new EntidadeProfissional;

$dados_profissional = $profissional->select("cd_profissional, nome, cpf, dt_nascimento", "WHERE id_usuario = ".$_SESSION['login']);

$usuario = new EntidadeUsuario;

$dados_usuario = $usuario->select("email, senha, telefone", "cd_usuario = ".$_SESSION['login']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaWork</title>
</head>
<body>
Seja bem-vindo, <?php echo $_SESSION['email']?>!
    <br>
    <a href="perfil.php"> Perfil</a>| <a href="inicial.php">Início</a> | <a href="../../apply/apply_logout.php">Sair</a>
    <hr>
    <h1>Perfil</h1>
    <h3>E-mail: <?php echo $dados_usuario->email; ?></h3>
    <h3>Telefone: <?php echo $dados_usuario->telefone; ?></h3>
    <h3>Senha: <?php echo $dados_usuario->senha; ?></h3>
    <h3>Nome: <?php echo $dados_profissional->nome; ?></h3>
    <h3>CPF: <?php echo $dados_profissional->cpf; ?></h3>
    <h3>Data de nascimento: <?php echo $dados_profissional->dt_nascimento; ?></h3>
        <a href="alterar_profissional.php"><input type="button" name="update" value="Alterar dados"></a>
        <a href="../../apply/apply_delete_profissional.php"><input type="button" name="deletar" value="deletar"></a>
</body>
</html>