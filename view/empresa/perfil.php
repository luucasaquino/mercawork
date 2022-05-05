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
    <a href="perfil.php"> Perfil</a>| <a href="vagas.php">Vagas</a> | <a href="inicial.php">Início</a> | <a href="../../apply/apply_logout.php">Sair</a>
    <hr>
    <h1>Perfil</h1>
    <h3>E-mail: <?php echo $dados_usuario->email; ?></h3>
    <h3>Telefone: <?php echo $dados_usuario->telefone; ?></h3>
    <h3>Senha: <?php echo $dados_usuario->senha; ?></h3>
    <h3>Nome fantasia: <?php echo $dados_empresa->nome; ?></h3>
    <h3>CNPJ: <?php echo $dados_empresa->cnpj; ?></h3>
        <a href="alterar_empresa.php"><input type="button" name="update" value="Alterar dados"></a>
        <a href="../../apply/apply_delete_empresa.php"><input type="button" name="deletar" value="deletar"></a>
</body>
</html>