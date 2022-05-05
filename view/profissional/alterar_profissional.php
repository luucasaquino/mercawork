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
    <h1>Alterar Perfil</h1>
    <form method="POST" action="../../apply/apply_update_profissional.php">
    <h3>E-mail: <?php echo "<input type='email' name='email' value='".$dados_usuario->email."'>"; ?></h3>
    <h3>Telefone: <?php echo "<input type='text' name='telefone' value='".$dados_usuario->telefone."'>"; ?></h3>
    <h3>Senha: <?php echo "<input type='password' name='senha' value='".$dados_usuario->senha."'>"; ?></h3>
    <?php echo "<input type='hidden' name='cd_profissional' value='$dados_profissional->cd_profissional'>";?>
    <h3>Nome: <?php echo "<input type='text' name='nome' value='".$dados_profissional->nome."'>"; ?></h3>
    <h3>CPF: <?php echo "<input type='text' name='cpf' value='".$dados_profissional->cpf."'>"; ?></h3>
    <h3>Data de nascimento: <?php echo "<input type='date' name='dt_nascimento' value='".$dados_profissional->dt_nascimento."'>"; ?></h3>
        <a href="perfil.php"><input type="button" name="cancelar" value="Cancelar"></a>
        <input type="submit" name="confirmar" value="Confirmar">
    </form>
</body>
</html>