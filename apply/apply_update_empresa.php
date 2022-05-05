<?php
session_start();
require '../vendor/autoload.php';

use App\Bd\EntidadeEmpresa;
use App\Bd\EntidadeUsuario;

if(isset($_POST['confirmar'])){
    $empresa = new EntidadeEmpresa;
    $usuario = new EntidadeUsuario;
     $update_empresa = $empresa->update($_POST['nome'], $_POST['cnpj'],  $_POST['cd_empresa']);
     $update_usuario = $usuario->update($_POST['email'], $_POST['telefone'], $_POST['senha'], $_SESSION['login']);
     $_SESSION['email'] = $_POST['email'];
    header('location: ../view/empresa/perfil.php');
}