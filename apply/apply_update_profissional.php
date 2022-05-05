<?php
session_start();
require '../vendor/autoload.php';

use App\Bd\EntidadeProfissional;
use App\Bd\EntidadeUsuario;

if(isset($_POST['confirmar'])){
    $profissional = new EntidadeProfissional;
    $usuario = new EntidadeUsuario;
     $update_profissional = $profissional->update($_POST['nome'], $_POST['cpf'], $_POST['dt_nascimento'], $_POST['cd_profissional']);
     $update_usuario = $usuario->update($_POST['email'], $_POST['telefone'], $_POST['senha'], $_SESSION['login']);
     $_SESSION['email'] = $_POST['email'];
    header('location: ../view/profissional/perfil.php');
}