<?php
session_start();
require '../../vendor/autoload.php';
if(empty($_SESSION['login'])){
    header('location: ../login.php');
}

use App\Bd\EntidadeEmpresa;
use App\Bd\EntidadeUsuario;

$empresa = new EntidadeEmpresa;

$dados_empresa = $empresa->select("cd_empresa, nome, cnpj", "WHERE id_usuario = ".$_SESSION['login']);

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
    <form method="POST" action="../../apply/apply_update_empresa.php">
    <h3>E-mail: <?php echo "<input type='email' name='email' value='".$dados_usuario->email."'>"; ?></h3>
    <h3>Telefone: <?php echo "<input type='text' name='telefone' value='".$dados_usuario->telefone."'>"; ?></h3>
    <h3>Senha: <?php echo "<input type='password' name='senha' value='".$dados_usuario->senha."'>"; ?></h3>
    <?php echo "<input type='hidden' name='cd_empresa' value='$dados_empresa->cd_empresa'>";?>
    <h3>Nome Fantasia: <?php echo "<input type='text' name='nome' value='".$dados_empresa->nome."'>"; ?></h3>
    <h3>CNPJ: <?php echo "<input type='text' name='cnpj' value='".$dados_empresa->cnpj."'>"; ?></h3>
        <a href="perfil.php"><input type="button" name="cancelar" value="Cancelar"></a>
        <input type="submit" name="confirmar" value="Confirmar">
    </form>
</body>
</html>