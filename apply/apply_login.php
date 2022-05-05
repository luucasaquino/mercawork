<?php
session_start();
require '../vendor/autoload.php';

use App\Pages\Autenticar;

$login = new Autenticar;
$dados = $login->efetuarLogin($_POST['email'], $_POST['senha']);
if ($dados != 'erro') {
    $_SESSION['login'] = $dados[0];
    $_SESSION['email'] = $dados[1];
    if($dados[2] == 1)
    header('Location: ../view/profissional/inicial.php');
    else
    header('Location: ../view/empresa/inicial.php');
} else {
    header('Location: ../view/login.php');
}
