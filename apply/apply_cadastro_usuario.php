<?php
session_start();
require '../vendor/autoload.php';

use App\Pages\Cadastro;
if(isset($_POST)){
$usuario = new Cadastro;

$_SESSION['id_cadastro'] = $usuario->cadastrarUsuario($_POST['email'], $_POST['senha'], $_POST['telefone'], $_POST['t']);
if($_POST['t'] == 1)
header('Location: ../view/cadastrar-profissional.php');
else
header('Location: ../view/cadastrar-empresa.php');
}